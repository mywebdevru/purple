<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;

class RigthColumn extends Component
{
    public $user;

    public function render()
    {
        return view('livewire.main.rigth-column');
    }
}
