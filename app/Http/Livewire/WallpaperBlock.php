<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WallpaperBlock extends Component
{
    public $user;

    public function render()
    {
        return view('livewire.wallpaper-block');
    }
}
