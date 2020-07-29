<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FriendshipRequest
 *
 * @property int $id
 * @property int $user_id
 * @property int $friend_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $friend
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FriendshipRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FriendshipRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FriendshipRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FriendshipRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FriendshipRequest whereFriendId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FriendshipRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FriendshipRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FriendshipRequest whereUserId($value)
 * @mixin \Eloquent
 */
class FriendshipRequest extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'friend_id',
    ];


    /**
     * Get the user who have this vehicle.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function friend()
    {
        return $this->belongsTo('App\User', 'friend_id');
    }
}
