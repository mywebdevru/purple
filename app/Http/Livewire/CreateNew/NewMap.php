<?php

namespace App\Http\Livewire\CreateNew;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class NewMap extends Component
{
    use WithFileUploads;

    public $description='';
    public $title='';
    public $map_data;
    public $map;
    public $post;
    public $photo;
    public $name;

    public function mount()
    {
        $this->createMap();
    }

    public function createMap()
    {
        $this->map = User::find(auth()->user()->id)->maps()->create();
    }

    public function saveMap()
    {
        $this->map->fill(['title' => $this->title, 'map_data' => $this->map_data])->save();
        $this->map->post()->update(['text' => $this->description]);
        $this->emit('mapCreated', $this->map->id);
    }

    public function deleteMap()
    {
        $this->map->delete();
        $this->emit('cancelCreateMap');
    }

    public function savePhoto()
    {
        $this->validate([
            'photo' => 'image|max:20480', // 20MB Max
        ]);
        $this->link = $this->photo->store('summernote');
        $img = Image::make($this->link);
        if ($img->width() > 800){
            $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }
        $this->emit('photoSaved', $this->link);
    }

    public function deletePhoto($name)
    {
        Storage::delete($name);
    }

    public function render()
    {
        return view('livewire.create-new.new-map');
    }
}
