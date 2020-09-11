<?php

namespace App\View\Components\Header;

use Illuminate\View\Component;

class AuthUser extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->full_name = auth()->user()->full_name;
        $this->creed = auth()->user()->creed;
        $this->avatar = auth()->user()->avatar;
        $this->id = auth()->user()->id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.header.auth-user', ['full_name' => $this->full_name, 'creed' => $this->creed, 'avatar' => $this->avatar, 'id' => $this->id]);
    }
}
