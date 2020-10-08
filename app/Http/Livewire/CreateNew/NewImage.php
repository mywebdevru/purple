<?php

namespace App\Http\Livewire\CreateNew;

use Livewire\Component;
use Intervention\Image\Facades\Image;
use App\Models\User;
use Livewire\WithFileUploads;

class NewImage extends Component
{
    use WithFileUploads;

    public $photo;
    public $create = false;
    public $description = '';

    protected $listeners = ['createNewImage' => 'toggleCreate'];

    public function toggleCreate()
    {
        $this->create = !$this->create;
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:2048', // 2MB Max
        ]);
    }

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:2048', // 2MB Max
            'description' => 'string|nullable',
        ]);
        $this->newImage = $this->photo->store('photos');
        $img = Image::make($this->newImage);
        if ($img ->width() > 1024){
            $img ->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img ->save();
        }
        $image = User::find(auth()->user()->id)->images()->create(['image' => $this->newImage, 'description' => $this->description]);
        $image->feed()->create(['authorable_id' => auth()->user()->id, 'authorable_type' => User::class]);
        $this->emitUp('photoCreated');
    }

    public function render()
    {
        return view('livewire.create-new.new-image');
    }
}
