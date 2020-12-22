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
        return $this->belongTo(Map::class, 'map_id');
    }
}
