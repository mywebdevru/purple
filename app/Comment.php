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

    /**
     * Get the Comment's Likes.
     */
    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }
}
