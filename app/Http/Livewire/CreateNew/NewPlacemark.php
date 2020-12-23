<?php

namespace App\Http\Livewire\CreateNew;

use Livewire\Component;
use Intervention\Image\Facades\Image;
use App\Models\User;
use Livewire\WithFileUploads;

class NewPlacemark extends Component
{
    use WithFileUploads;

    public $photos=[];
    public $create = false;
    public $description = '';
    public $map, $placemark, $number;

    protected $listeners = ['createNewImage' => 'toggleCreate'];

    public function toggleCreate()
    {
        $this->create = !$this->create;
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image',
        ]);
    }

    public function savePlacemark()
    {
        $this->validate([
            'photos.*' => 'image',
            'description' => 'string|nullable',
            'number' => 'integer',
        ]);
        $this->placemark = $this->map->placemarks()->create(['number' => $this->number, 'description' => $this->description]);
        foreach ($this->photos as $photo) {
            $photo = $photo->store('photos');
            $img = Image::make($photo);
            if ($img ->width() > 1024){
                $img ->resize(1024, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->sharpen(3)
                ->gamma(1.1)
                ->contrast(5)
                ->save();
            }
            $this->placemark->images()->create(['image' => $photo]);
        }
        $this->emitUp('placemarkCreated');
    }

    public function render()
    {
        return view('livewire.create-new.new-placemark');
    }
}
