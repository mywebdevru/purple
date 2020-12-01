<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WallpaperBlock extends Component
{
    public $user, $map, $isOwner;

    public function mount()
    {
        $this->user->loadMissing('requestedFriendships.user', 'friendshipRequests');
        $this->isOwner = $this->checkIsOwner();
    }

    public function createMap()
    {
        $this->map = $this->user->maps()->create();
        return redirect()->route('user.map.edit', ['user' => $this->user, 'action' => 'create', 'map' => $this->map]);
    }

    protected function checkIsOwner()
    {
        return $this->user->id == auth()->user()->id;
    }
    public function render()
    {
        return view('livewire.wallpaper-block');
    }
}
