<?php

namespace App\Http\Livewire\Feed;

use Livewire\Component;

class Comment extends Component
{
    public $comment;
    public $deleted = 0;
    public $nowEdit = 0;
    public $showMore;

    public function mount()
    {
        $this->showMore = 1;
    }

    protected $listeners = ['commentSaved' => 'setEditStatus', 'cancelEdit' => 'setEditStatus'];

    public function setEditStatus() {
        $this->nowEdit = !$this->nowEdit;
    }

    public function deleteComment()
    {
        $this->deleted = $this->comment->delete();
        $this->emitUp('commentDeleted');
    }

    public function render()
    {
        return view('livewire.feed.comment');
    }
}
