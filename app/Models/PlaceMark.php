<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlaceMark extends Model
{
    protected $fillable = [
        'number',
        'description',
    ];

    public function map()
    {
        return $this->belongTo('App\Models\Map', 'map_id');
    }

    /**
     * Get the PlaceMark's Images.
     */
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}
