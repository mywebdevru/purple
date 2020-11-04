<?php

namespace App\Http\Livewire\Main;

use App\Models\Map;
use Livewire\Component;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\DB;

class UsersMaps extends Component
{
    public $user, $isOwner, $showCommentsButton, $commentsCount;
    public $commentsIsLoaded = 0;
    public $commentsIsShown = 0;
    public $unpublishedMaps = [];
    public $publishedMaps = [];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->isOwner = $this->checkIsOwner();
        $this->setMaps();
    }

    protected function checkIsOwner()
    {
        return $this->user->id == auth()->user()->id;
    }

    protected function setMaps()
    {
        if($this->isOwner){
            $this->unpublishedMaps = $this->user->maps()->whereNull('published')->orderBy('updated_at', 'DESC')->get();
            $this->publishedMaps = $this->user->maps()->whereNotNull('published')->orderBy('updated_at', 'DESC')->withCount(['comments', 'likes'])->get();
        } else {
            $this->publishedMaps = $this->user->maps()->whereNotNull('published')->orderBy('updated_at', 'DESC')->withCount(['comments', 'likes'])->get();
        }
    }

    public function deleteMap(Map $map)
    {
        DB::transaction(function () use($map) {
            $comments = $map->comments();
            Like::whereIn('likeable_id', $comments->pluck('id'))->where('likeable_type', Comment::class)->delete();
            $comments->forceDelete();
            $map->likes()->forceDelete();
            $map->post();
            $map->delete();
        });
        $this->setMaps();
    }

    public function editMap($mapId)
    {
        return redirect()->route('user.map.edit', ['user' => $this->user, 'action' => 'edit', 'map' => $mapId]);
    }

    public function render()
    {
        return view('livewire.main.users-maps')
            ->extends('layouts.app', ['user' => $this->user])
            ->section('content');
    }
}
