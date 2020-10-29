<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;

class UsersMaps extends Component
{
    public $user;
    public $unpublishedMaps = [];
    public $publishedMaps = [];
    public $isOwner;

    public function mount()
    {
        $this->isOwner = $this->checkIsOwner();
        $this->setMaps();
    }

    protected function checkIsOwner()
    {
        return $this->user->id == auth()->user()->id;
    }

    protected function setMaps()
    {
        if($this->isOwner){
            $this->unpublishedMaps = $this->user->maps()->whereNull('published')->get();
            $this->publishedMaps = $this->user->maps()->whereNotNull('published')->get();
        } else {
            $this->publishedMaps = $this->user->maps()->whereNotNull('published')->get();
        }
    }

    public function render()
    {
        return view('livewire.main.users-maps');
    }
}
