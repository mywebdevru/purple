<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use App\Models\Map as ModelMap;
use App\Models\User;

class Map extends Component
{
    public $map, $user, $description, $mode, $showCommentsButton, $commentsCount;
    public $commentsIsLoaded = 0;
    public $commentsIsShown = 0;

    public function mount(User $user, ModelMap $map, $mode)
    {
        abort_if($this->mode != 'show' && $this->mode != 'preview', 404);
        $this->mode = $mode;
        $this->user = $user;
        $this->map = $map;
        $this->description = $this->map->post->text;
        $this->setModeAttributes();
    }

    protected $listeners = ['commentDeleted' => 'getCommentsCount', 'commentAdded' => 'showNewComment'];

    protected function setModeAttributes()
    {
        if($this->mode == 'show'){
            $this->showCommentsButton = $this->getButton();
            $this->commentsCount = $this->getCommentsCount();
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

    public function editMap()
    {
        return redirect()->route('user.map.edit', ['user' => $this->user, 'action' => 'edit', 'map' => $this->map]);
    }

    public function deleteMap()
    {
        $this->map->delete();
        return redirect()->route('user.maps', ['user' => auth()->user()->id]);
    }

    public function publishMap()
    {
        $this->map->update(['published' => true]);
        return redirect()->route('user.maps', ['user' => auth()->user()->id]);
    }


    public function getCommentsCount()
    {
       $this->commentsCount = $this->map->comments->count();
       return $this->commentsCount;
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
        $this->map->load('comments.likes.authorable', 'comments.authorable');
        $this->showCommentsButton = $this->getButton();
        $this->commentsCount = $this->getCommentsCount();
        if (!$this->commentsIsLoaded){
            $this->commentsIsLoaded = !$this->commentsIsLoaded;
        }
    }

    public function render()
    {
        return view('livewire.main.map')
            ->extends('layouts.app', ['user' => $this->user])
            ->section('content');
    }
}
