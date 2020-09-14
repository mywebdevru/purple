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
        DB::transaction(function () {
            foreach ($this->post->comments as $comment){
                $comment->likes()->forceDelete();
            }
            $images = $this->post->images()->pluck('image')->toArray();
            Storage::delete($images);
            $this->post->images()->forceDelete();
            $this->post->comments()->forceDelete();
            $this->post->likes()->forceDelete();
            $this->post->feed()->forceDelete();
            $this->post->delete();
        });
        $this->deleted = true;
    }

    public function render()
    {
        return view('livewire.feed.post');
    }
}
