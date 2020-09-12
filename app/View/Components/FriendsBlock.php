<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FriendsBlock extends Component
{
    public $friends;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($friends)
    {
        $this->friends = $friends;
    }

    public function friendsCount()
    {
        return $this->friends->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.friends-block');
    }
}
