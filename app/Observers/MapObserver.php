<?php

namespace App\Observers;

use App\Models\Map;
use App\Models\Post;

class MapObserver
{
    /**
     * Handle the map "created" event.
     *
     * @param  \App\Models\Map  $map
     * @return void
     */
    public function created(Map $map)
    {
        $map->post()->create();
    }

    /**
     * Handle the map "updated" event.
     *
     * @param  \App\Models\Map  $map
     * @return void
     */
    public function updated(Map $map)
    {
        //
    }

    /**
     * Handle the map "deleted" event.
     *
     * @param  \App\Models\Map  $map
     * @return void
     */
    public function deleting(Map $map)
    {
        Post::find($map->post->id)->delete();
    }

    /**
     * Handle the map "restored" event.
     *
     * @param  \App\Models\Map  $map
     * @return void
     */
    public function restored(Map $map)
    {
        //
    }

    /**
     * Handle the map "force deleted" event.
     *
     * @param  \App\Models\Map  $map
     * @return void
     */
    public function forceDeleted(Map $map)
    {
        //
    }
}
