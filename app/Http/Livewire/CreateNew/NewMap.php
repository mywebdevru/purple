<?php

namespace App\Http\Livewire\CreateNew;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Map;
use Livewire\WithFileUploads;

class NewMap extends Component
{
    use WithFileUploads;

    public $map_data, $map, $post, $photo, $name, $action, $user, $description, $title;

    protected $messages = [
        'title.required' => 'Введите название карты.',
        'title.min' => 'Название не короче пяти символов.',
        'map_data.min' => 'Нарисуйте свой маршрут',
    ];

    public function mount(User $user, $action, Map $map)
    {
        abort_if($this->user->cant('update', $this->map), 403, 'Это не ваша карта!');
        $this->action = $action;
        $this->map = $map;
        $this->setMapAttributes();
        $this->user=$user;
    }

    protected function setMapAttributes()
    {
        if($this->action == 'create'){
            $this->title = '';
            $this->description = '';
        } elseif($this->action == 'edit') {
            $this->title = $this->map->title;
            $this->description = $this->map->post->text;
        } else{
            abort(404,'Нет такой страницы');
        }
    }

    public function saveDraft()
    {
        $this->saveMap();
    }

    public function publishMap()
    {
        $this->saveMap();
        $this->map->update(['published' => true]);
        return redirect()->route('user.maps', ['user' => auth()->user()->id]);
    }

    public function previewMap()
    {
        $this->saveMap();
        return redirect()->route('user.map.show', ['user' => auth()->user()->id, 'mode' => 'preview', 'map' => $this->map]);
    }

    protected function saveMap()
    {
        abort_if($this->user->cant('update', $this->map), 403, 'Вы не можете редактировать эту карту!');
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
        abort_if($this->user->cant('delete', $this->map), 403, 'Вы не имеете права удалять эту карту!');
        $this->map->delete();
        return redirect()->route('user.maps', ['user' => auth()->user()->id]);
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
        return view('livewire.create-new.new-map')
            ->extends('layouts.app', ['user' => $this->user])
            ->section('content');
    }
}
