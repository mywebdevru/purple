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
    public $action;

    protected $messages = [
        'title.required' => 'Введите название карты.',
        'title.min' => 'Название не короче пяти символов.',
        'map_data.min' => 'Нарисуйте свой маршрут',
    ];

    public function mount()
    {
            $this->getMap();
    }

    public function getMap()
    {
        if($this->action == 'create'){
            $this->map = User::find(auth()->user()->id)->maps()->create();
        }else{
            $this->map = User::find(auth()->user()->id)->maps()->orderBy('created_at', 'DESC')->first();
            $this->title = $this->map->title;
            $this->description =$this->map->post->text;
        }
    }

    public function previewMap()
    {
        $this->saveMap();
        $this->emit('showMap', $this->map->id);
    }

    protected function saveMap()
    {
        $this->validate([
            'title' => 'required|min:5',
            'map_data' => 'json|min:8',
            'description' => 'string|nullable'
        ]);
        $this->map->update(['title' => $this->title, 'map_data' => $this->map_data]);
        $this->map->post()->update(['text' => $this->description]);
    }

    public function deleteMap()
    {
        $this->map->delete();
        $this->emit('showFeed');
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
        $this->map->post->images()->create(['image' => $this->link]);
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
