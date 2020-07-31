<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'feedable_id', 'feedable_type'
    ];

    public function feedable()
    {
        return $this->morphTo();
    }
}
