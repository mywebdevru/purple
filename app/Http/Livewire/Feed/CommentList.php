<?php

namespace App\Http\Livewire\Feed;

use Livewire\Component;

class CommentList extends Component
{
    public $comments;
    public $show;

    // public function mount($slideDown = false)
    // {
    //     $this->slideDown = $slideDown;
    // }

    // protected $listeners = ['showComments' => 'showComments'];



    public function render()
    {
        return view('livewire.feed.comment-list');
    }
}
