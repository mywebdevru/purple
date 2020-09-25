<?php

namespace App\Http\Livewire\Feed;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class Post extends Component
{
    public $post;
    public $deleted = 0;
    public $commentsIsLoaded = 0;
    public $commentsIsShown = 0;
    public $showCommentsButton;
    public $commentsCount;

    public function mount()
    {
        $this->showCommentsButton = $this->getButton();
        $this->commentsCount = $this->getCommentsCount();
    }

    protected $listeners = ['commentDeleted' => 'getCommentsCount', 'commentAdded' => 'showNewComment'];

    public function deletePost()
    {
        $this->deleted = $this->post->delete();
    }

    protected function getButton()
    {
        if (!$this->commentsIsShown) {
            return '<a href="#" @click.prevent="show_comments = !show_comments"  class="more-comments" wire:click="changeIsShownCommentsStatus">Показать комментарии </a><div wire:loading.class="comments-loading"> + </div>';
        } else {
            return '<a href="#" @click.prevent="show_comments = !show_comments"  class="more-comments" wire:click="changeIsShownCommentsStatus">Скрыть комментарии </a><div wire:loading.class="comments-loading"> - </div>';
        }
    }

    public function getCommentsCount()
    {
       $this->commentsCount = $this->post->comments->count();
       return $this->commentsCount;
    }

    public function showNewComment()
    {
        if (!$this->commentsIsShown){
            $this->commentsIsShown = !$this->commentsIsShown;
        }
        $this->showComments();
    }

    public function changeIsShownCommentsStatus()
    {
        $this->commentsIsShown = !$this->commentsIsShown;
        $this->showComments();
    }

    protected function showComments()
    {
        $this->post->load('comments.likes.authorable', 'comments.authorable');
        $this->showCommentsButton = $this->getButton();
        $this->commentsCount = $this->getCommentsCount();
        if (!$this->commentsIsLoaded){
            $this->commentsIsLoaded = !$this->commentsIsLoaded;
        }
    }

    public function render()
    {
        return view('livewire.feed.post');
    }
}
