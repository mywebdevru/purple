<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'likeable_id', 'likeable_type', 'authorable_id', 'authorable_type',
    ];

    public function likeable()
    {
        return $this->morphTo();
    }

    public function authorable()
    {
        return $this->morphTo('authorable');
    }

}
