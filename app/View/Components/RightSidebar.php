<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RightSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->friends = auth()->user()->friends;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.right-sidebar', ['friends' => $this->friends]);
    }
}
