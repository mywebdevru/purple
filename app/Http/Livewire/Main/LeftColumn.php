<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;

class LeftColumn extends Component
{
    public $user;

    public function render()
    {
        return view('livewire.main.left-column');
    }
}
