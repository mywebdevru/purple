<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Club
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereCreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $full_name
 * @property-read mixed $location
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $image
 * @property-read int|null $image_count
 */
class Club extends Model
{
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
        return $this->morphToMany('App\User', 'subscrable');
    }

    /**
     * Get the Club's Post.
     */
    public function posts()
    {
        return $this->morphMany('App\Post', 'postable');
    }

    /**
     * Get the Club's Images.
     */
    public function image()
    {
        return $this->morphMany('App\Image', 'postable');
    }

    /**
     * Get the Clubs's Comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'authorable');
    }

    /**
     * Get the Club's Likes.
     */
    public function likes()
    {
        return $this->morphMany('App\Like', 'authorable');
    }

    public function getFullNameAttribute() {
        return "Клуб $this->name";
    }

    public function getLocationAttribute()
    {
        return "$this->city, $this->country";
    }
}
