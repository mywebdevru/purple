<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Friends
 *
 * @property int $id
 * @property int $user_id
 * @property int $friend_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friends newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friends newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friends query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friends whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friends whereFriendId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friends whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friends whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friends whereUserId($value)
 * @mixin \Eloquent
 */
class Friends extends Model
{
    public $timestamps = true;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'friend_id',
    ];


    /**
     * Get the user who have this fiend.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'friend_id');
    }
}
