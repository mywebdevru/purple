<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $surname
 * @property string|null $avatar
 * @property string $gender
 * @property string|null $birth_date
 * @property string|null $country
 * @property string|null $city
 * @property string|null $creed Девиз по жизни
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Friends[] $friends
 * @property-read int|null $friends_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FriendshipRequest[] $friendshipRequests
 * @property-read int|null $friendship_requests_count
 * @property-read mixed $full_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Posts[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FriendshipRequest[] $requestedFriendships
 * @property-read int|null $requested_friendships_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Clubs[] $subscribesToClubs
 * @property-read int|null $subscribes_to_clubs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Groups[] $subscribesToGroups
 * @property-read int|null $subscribes_to_groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $subscribesToUsers
 * @property-read int|null $subscribes_to_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\UsersVehicles[] $usersVehicles
 * @property-read int|null $users_vehicles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
