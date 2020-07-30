<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imageable_id', 'imageable_type', 'image'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function feed()
    {
        return $this->morphOne('App\Feed', 'feedable');
    }
}
