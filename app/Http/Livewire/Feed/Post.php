<?php

namespace App\Http\Livewire\Feed;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class Post extends Component
{
    public $post;
    public $deleted;
    public $commentsIsLoaded;

    public function mount($deleted = 0, $commentsIsLoaded = false)
    {
        $this->deleted = $deleted;
        $this->commentsIsLoaded =$commentsIsLoaded;
    }

    // public function getPostProperty()
    // {
    //     return Post::find($this->postId);
    // }

    public function deletePost()
    {
        return $this->deleted = $this->post->delete();
    }

    public function showComments(){
        if (!$this->commentsIsLoaded){
            $this->post->loadMissing('comments.likes.authorable', 'comments.authorable');
            $this->commentsIsLoaded =!$this->commentsIsLoaded;
        }
    }

    public function render()
    {
        return view('livewire.feed.post');
    }
}
