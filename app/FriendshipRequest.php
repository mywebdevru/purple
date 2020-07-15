<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
