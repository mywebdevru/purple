<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Posts
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
    //     return $this->hasMany('App\Postable');
    // }

    public function clubs()
    {
        return $this->morphedByMany('App\Club', 'postable');
    }

    public function groups()
    {
        return $this->morphedByMany('App\Club', 'postable');
    }

    public function user()
    {
        return $this->morphedByMany('App\User', 'postable');
    }
}
