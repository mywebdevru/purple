<?php

namespace App\Http\Livewire\Feed;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

use Livewire\Component;

class Post extends Component
{
    use WithFileUploads;

    public $post;
    public $text;
    public $photo;
    public $link;
    public $deleted = 0;
    public $commentsIsLoaded = 0;
    public $commentsIsShown = 0;
    public $showCommentsButton;
    public $commentsCount;
    public $editPost = 0;
    public $showMore = 1;

    public function mount()
    {
        $this->showCommentsButton = $this->getButton();
        $this->commentsCount = $this->getCommentsCount();
        $this->text = $this->getText();
    }

    protected $listeners = ['commentDeleted' => 'getCommentsCount', 'commentAdded' => 'showNewComment'];

    public function deletePost()
    {
        $this->deleted = $this->post->delete();
    }

    public function savePost()
    {
        $this->post->text = $this->text;
        $this->post->save();
        $this->editPost = 0;
        $this->showMore = 1;
    }

    protected function getButton()
    {
        if (!$this->commentsIsShown) {
            return '<a href="#" @click.prevent="show_comments = !show_comments"  class="more-comments" wire:click="toggleComments">Показать комментарии </a><div wire:loading.class="comments-loading"> + </div>';
        } else {
            return '<a href="#" @click.prevent="show_comments = !show_comments"  class="more-comments" wire:click="toggleComments">Скрыть комментарии </a><div wire:loading.class="comments-loading"> - </div>';
        }
    }

    protected function getCommentsCount()
    {
       $this->commentsCount = $this->post->comments->count();
       return $this->commentsCount;
    }

    protected function getText()
    {
       return $this->post->text;
    }

    public function savePhoto()
    {
        $this->link = $this->photo->store('summernote');
        $this->emit('photoSaved', $this->link);
    }

    public function deletePhoto($name)
    {
        Storage::delete($name);
    }

    public function showNewComment()
    {
        if (!$this->commentsIsShown){
            $this->commentsIsShown = !$this->commentsIsShown;
        }
        $this->showComments();
    }

    public function toggleComments()
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

    public function toggleEdit()
    {
        $this->editPost = !$this->editPost;
    }

    public function render()
    {
        return view('livewire.feed.post');
    }
}
