<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Club[] $clubs
 * @property-read int|null $clubs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Club[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $postable_id
 * @property string $postable_type
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $postable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePostableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePostableType($value)
 * @property-read \App\Models\Feed|null $feed
 */
class Post extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text'
    ];

    public function postable()
    {
        return $this->morphTo();
    }

    public function feed()
    {
        return $this->morphOne('App\Models\Feed', 'feedable');
    }

    /**
     * Get the Post's Images.
     */
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');

    }

    /**
     * Get the Post's Comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    /**
     * Get the Post's Likes.
     */
    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }
}
