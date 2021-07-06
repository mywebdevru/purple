<?php

namespace App\Http\Livewire\Feed;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Image extends Component
{
    public $image;
    public $deleted = 0;
    public $commentsIsLoaded = 0;
    public $commentsIsShown = 0;
    public $showCommentsButton;
    public $commentsCount;
    public $editDescription = false;
    public $description;
    public $showMore = true;

    public function mount()
    {
        $this->showCommentsButton = $this->getButton();
        $this->description = $this->getDescription();
    }

    protected $listeners = ['commentDeleted' => 'freshComments', 'commentAdded' => 'showNewComment'];


    public function deleteImage()
    {
        if(!$this->deleted){
            DB::transaction(function () {
                foreach ($this->image->comments as $comment){
                    $comment->likes()->forceDelete();
                }
                $this->image->comments()->forceDelete();
                $this->image->likes()->forceDelete();
                $this->image->feed()->forceDelete();
                Storage::delete($this->image->image);
                $this->image->delete();
            });
            $this->deleted = true;
        }
    }

    protected function getButton()
    {
        if (!$this->commentsIsShown) {
            return '<a href="#" @click.prevent="show_comments = !show_comments"  class="more-comments" wire:click="toggleComments">Показать комментарии </a><div wire:loading.class="comments-loading"> + </div>';
        } else {
            return '<a href="#" @click.prevent="show_comments = !show_comments"  class="more-comments" wire:click="toggleComments">Скрыть комментарии </a><div wire:loading.class="comments-loading"> - </div>';
        }
    }

    public function freshComments()
    {
        $this->image->load('comments.likes.authorable', 'comments.authorable');
    }

    protected function getDescription()
    {
        return $this->image->description;
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
        $this->freshComments();
        $this->showCommentsButton = $this->getButton();
        if (!$this->commentsIsLoaded){
            $this->commentsIsLoaded = !$this->commentsIsLoaded;
        }
    }

    public function toggleEdit()
    {
        $this->editDescription = !$this->editDescription;
    }

    public function saveDescription()
    {
        $this->image->description = $this->description;
        $this->image->save();
        $this->toggleEdit();
        $this->showMore = true;
    }

    public function render()
    {
        return view('livewire.feed.image');
    }
}
