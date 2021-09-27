<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Club
 *
 * @property int $id
 * @property string $name
 * @property string|null $avatar
 * @property string|null $birth_date
 * @property string $country
 * @property string $city
 * @property string|null $creed Девиз по жизни
 * @property string|null $description Описание
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club whereCreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Club whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $full_name
 * @property-read mixed $location
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $image
 * @property-read int|null $image_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Feed[] $feeds
 * @property-read int|null $feeds_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subscrable[] $subscribers
 * @property-read int|null $subscribers_count
 */
class Club extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'birth_date', 'country', 'city', 'creed', 'description',
    ];

    protected $appends = [
        'full_name', 'location'
    ];


    /**
     * Get the users who have subscribe to this Club.
     */
    public function users()
    {
        return $this->morphToMany('App\Models\User', 'subscrable');
    }

    /**
     * Get the Club's Post.
     */
    public function posts()
    {
        return $this->morphMany('App\Models\Post', 'postable');
    }

    /**
     * Get the Club's Images.
     */
    public function image()
    {
        return $this->morphMany('App\Models\Image', 'postable');
    }

    /**
     * Get the Clubs's Comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'authorable');
    }

    /**
     * Get the Club's Likes.
     */
    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'authorable');
    }

    public function feeds()
    {
        return $this->morphMany('App\Models\Feed', 'authorable');
    }

    public function subscribers()
    {
        return $this->morphMany('App\Models\Subscrable', 'subscrable');
    }
    public function getFullNameAttribute() {
        return "Клуб $this->name";
    }

    public function getLocationAttribute()
    {
        return "$this->city, $this->country";
    }
}
