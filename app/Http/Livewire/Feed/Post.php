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

    public function deletePost()
    {
        return $this->deleted = $this->post->delete();
    }

    public function showComments(){
        if (!$this->commentsIsLoaded){
            $this->post->loadMissing('comments.likes.authorable', 'comments.authorable');
            $this->commentsIsLoaded = !$this->commentsIsLoaded;
        } else {
            $this->skipRender();
        }
    }

    public function render()
    {
        return view('livewire.feed.post');
    }
}
