<?php

namespace App\Http\Livewire\Feed;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class Post extends Component
{
    public $post;
    public $deleted;

    public function mount($deleted = 0)
    {
        $this->deleted = $deleted;
    }

    // public function getPostProperty()
    // {
    //     return Post::find($this->postId);
    // }

    public function deletePost()
    {
        return $this->deleted = $this->post->delete();
    }

    public function render()
    {
        return view('livewire.feed.post');
    }
}
