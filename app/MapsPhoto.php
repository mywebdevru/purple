<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapsPhoto extends Model
{
    protected $fillable = ['map_id', 'filename'];

    public function map()
    {
        return $this->belongsTo('App\Map', 'map_id', 'id');
    }
}
