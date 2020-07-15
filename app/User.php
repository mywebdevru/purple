<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'avatar', 'country', 'city', 'creed', 'birth_date', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'full_name',
    ];

     /**
     * Get the vehicles of user.
     */
    public function usersVehicles()
    {
        return $this->hasMany('App\UsersVehicles');
    }

    /**
     * Get the user's friends.
     */
    public function friends()
    {
        return $this->hasMany('App\Friends');
    }

    /**
     * Get the friendship requests that makes the user.
     */
    public function friendshipRequests()
    {
        return $this->hasMany('App\FriendshipRequest');
    }

    /**
     * Get the friendship requests that the user get from other one.
     */
    public function requestedFriendships()
    {
        return $this->hasMany('App\FriendshipRequest', 'friend_id');
    }

    // public function subscrable()
    // {
    //     return $this->hasMany('App\Subscrable');
    // }

    /**
     * Get the user's Clubs subscribes.
     */
    public function subscribesToClubs()
    {
        return $this->morphedByMany('App\Clubs', 'subscrable');
    }

     /**
     * Get the user's Groups subscribes.
     */
    public function subscribesToGroups()
    {
        return $this->morphedByMany('App\Groups', 'subscrable');
    }

    /**
     * Get the user's Users subscribes.
     */
    public function subscribesToUsers()
    {
        return $this->morphedByMany('App\User', 'subscrable');
    }

    /**
     * Get the user's Posts.
     */
    public function posts()
    {
        return $this->morphToMany('App\Posts', 'postable');
    }

    public function removeAvatar()
    {
        Storage::delete($this->avatar);
    }

    public function getFullNameAttribute() {
        return "{$this->name} {$this->surname}";
    }


}
