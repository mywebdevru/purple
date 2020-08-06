<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'commentable_id', 'commetable_type', 'authorable_id', 'authorable_type', 'text'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function authorable()
    {
        return $this->morphTo('authorable');
    }

    // public function likes()
    // {
    //     return $this->morphOne('App\Like', 'likeable');
    // }
}
