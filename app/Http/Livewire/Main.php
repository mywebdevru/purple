<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Map;

class Main extends Component
{
    public $user;
    public $actionMap = '';
    public $showNewMap = 0;
    public $showMapList = 0;

    protected $listeners = ['createNewMap' => 'createMap', 'editMap' => 'editMap', 'showMap', 'showFeed', 'showUsersMaps'];

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

    public function showUsersMaps()
    {
        $this->actionMap = '';
        $this->showNewMap = 0;
        $this->showMapList = 1;
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
