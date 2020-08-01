<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Post
 *
 * @property int $id
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Club[] $clubs
 * @property-read int|null $clubs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Club[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $postable_id
 * @property string $postable_type
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $postable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post wherePostableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post wherePostableType($value)
 * @property-read \App\Feed|null $feed
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
        return $this->morphOne('App\Feed', 'feedable');
    }

    /**
     * Get the Post's Images.
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
