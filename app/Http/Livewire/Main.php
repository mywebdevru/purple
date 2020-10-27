<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Map;

class Main extends Component
{
    public $user;
    public $actionMap = '';
    public $showNewMap = 0;

    protected $listeners = ['createNewMap' => 'createMap', 'editMap' => 'editMap', 'showMap', 'showFeed'];

    public function createMap()
    {
        $this->actionMap = 'create';
    }

    public function editMap(Map $map)
    {
        $this->actionMap = 'edit';
    }

    public function showMap(Map $map)
    {
        $this->actionMap = '';
        $this->showNewMap = $map->id;
    }

    public function showFeed(){
            $this->actionMap = '';
            $this->showNewMap = 0;
    }

    public function render()
    {
        return view('livewire.main');
    }
}
