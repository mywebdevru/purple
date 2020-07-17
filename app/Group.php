<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Group
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereCreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Group extends Model
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
     * Get the users who have subscribe to this Group.
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
