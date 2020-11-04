<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Map;
use App\Models\User;
use Illuminate\Http\Request;

class Main extends Component
{
    public $user;
    public $map;
    public $actionMap = '';
    public $showNewMap = 0;
    public $showMapList = 0;

    protected $listeners = ['createNewMap' => 'createMap', 'editMap', 'showMap', 'showFeed', 'showUsersMaps'];

    public function mount(User $user, Request $request)
    {
        if($request->action == 'edit'){
            $this->actionMap = 'edit';
            $this->map = Map::find($request->map);
        }
        $this->user = $user;
    }

    public function createMap()
    {
        $this->actionMap = 'create';
    }

    public function editMap()
    {
        $this->actionMap = 'edit';
    }

    public function showMap(Map $map)
    {
        $this->actionMap = 'preview';
        $this->map = $map;
    }

    public function showUsersMaps()
    {
        $this->actionMap = '';
        $this->showNewMap = 0;
        $this->showMapList = 1;
    }

    public function showFeed()
    {
        $this->actionMap = '';
        $this->showNewMap = 0;
    }

    public function render()
    {
        return view('livewire.main')
            ->extends('layouts.app', ['user' => $this->user])
            ->section('content');
    }
}
