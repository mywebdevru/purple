<?php

namespace App\Http\Livewire\Header;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $query, $result;

    public function search()
    {
        $this->result = User::search($this->query)->query(function ($builder) {
            $builder->with('usersVehicles');
        })->get()->take(20);
    }

    public function render()
    {
        $this->search();
        return view('livewire.header.search');
    }
}
