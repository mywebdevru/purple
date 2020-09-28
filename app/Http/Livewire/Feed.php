<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Feed extends Component
{
    public $feed;
    public $create = '';

    public function render()
    {
        return view('livewire.feed');
    }
}
