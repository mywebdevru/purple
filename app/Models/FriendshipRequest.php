<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FriendshipRequest
 *
 * @property int $id
 * @property int $user_id
 * @property int $friend_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $friend
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest whereFriendId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest whereUserId($value)
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
        return $this->belongsTo('App\Models\User');
    }

    public function friend()
    {
        return $this->belongsTo('App\Models\User', 'friend_id');
    }
}
