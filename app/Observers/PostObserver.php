<?php

namespace App\Observers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        //
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the post "deleting" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleting(Post $post)
    {
            Like::whereIn('likeable_id', $post->comments()->pluck('id'))->where('likeable_type', Comment::class)->delete();
            $post->comments()->forceDelete();
            Storage::delete($post->images()->pluck('image')->toArray());
            $post->images()->forceDelete();
            $post->likes()->forceDelete();
            $post->feed()->forceDelete();
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
