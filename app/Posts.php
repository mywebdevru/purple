<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text'
    ];

    // public function postables()
    // {
    //     return $this->hasMany('App\Postables');
    // }

    public function clubs()
    {
        return $this->morphedByMany('App\Clubs', 'postable');
    }

    public function groups()
    {
        return $this->morphedByMany('App\Clubs', 'postable');
    }

    public function user()
    {
        return $this->morphedByMany('App\User', 'postable');
    }
}
