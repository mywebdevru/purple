<?php

namespace App\Http\Livewire\Feed;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Image extends Component
{
    public $image;
    public $deleted = 0;
    public $commentsIsLoaded = 0;

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
                $this->image->delete();
            });
            $this->deleted = true;
        }
    }

    public function showComments(){
        if (!$this->commentsIsLoaded){
            $this->image->loadMissing('comments.likes.authorable', 'comments.authorable');
            $this->commentsIsLoaded = !$this->commentsIsLoaded;
        } else {
            $this->skipRender();
        }
    }

    public function render()
    {
        return view('livewire.feed.image');
    }
}
