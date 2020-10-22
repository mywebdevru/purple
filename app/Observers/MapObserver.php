<?php

namespace App\Observers;

use App\Models\Map;

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
        $map->post()->delete();
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
