<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Groups
 *
 * @property int $id
 * @property string $name
 * @property string|null $avatar
 * @property string|null $creed Девиз по жизни
 * @property string|null $description Описание
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Posts[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups whereCreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Groups extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'creed', 'description',
    ];


    /**
     * Get the users who have subscribe to this Groups.
     */
    public function users()
    {
        return $this->morphToMany('App\User', 'subscrable');
    }

    /**
     * Get the Group's's Posts.
     */
    public function posts()
    {
        return $this->morphToMany('App\Posts', 'postable');
    }
}
