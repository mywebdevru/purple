<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Map;

class Main extends Component
{
    public $user;
    public $createMap = false;
    public $showNewMap = 0;

    protected $listeners = ['createNewMap' => 'toggleCreateMap', 'mapCreated', 'cancelCreateMap' => 'showFeed'];

    public function toggleCreateMap()
    {
        $this->createMap =!$this->createMap;
    }

    public function mapCreated(Map $map)
    {
        $this->toggleCreateMap();
        $this->showNewMap = $map->id;
    }

    public function showFeed(){
            $this->createMap = false;
            $this->showNewMap = 0;
    }

    public function render()
    {
        return view('livewire.main');
    }
}
