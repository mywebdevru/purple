<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use App\Models\Map as ModelMap;

class Map extends Component
{
    public $mapId;
    public $map;
    public $description;

    public function mount()
    {
        $this->map = ModelMap::find($this->mapId);
        $this->description =$this->map->post->text;

    }

    public function editMap()
    {
        $this->emit('editMap', $this->map->id);
    }

    public function deleteMap()
    {
        $this->map->delete();
        $this->emit('showFeed');
    }

    public function render()
    {
        return view('livewire.main.map');
    }
}
