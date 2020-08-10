<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

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
 * @property \Illuminate\Support\Carbon|null $birth_date
 * @property string|null $surname
 * @property string|null $avatar
 * @property string $gender
 * @property string|null $country
 * @property string|null $city
 * @property string|null $creed Девиз по жизни
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Friend[] $friends
 * @property-read int|null $friends_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FriendshipRequest[] $friendshipRequests
 * @property-read int|null $friendship_requests_count
 * @property-read mixed $full_name
 * @property-read mixed $location
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FriendshipRequest[] $requestedFriendships
 * @property-read int|null $requested_friendships_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Club[] $subscribesToClubs
 * @property-read int|null $subscribes_to_clubs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $subscribesToGroups
 * @property-read int|null $subscribes_to_groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $subscribesToUsers
 * @property-read int|null $subscribes_to_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\UserVehicle[] $usersVehicles
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
 * @property string|null $wallpaper
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWallpaper($value)
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;

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
        'full_name', 'location'
    ];

    protected $dates = ['birth_date'];

     /**
     * Get the vehicles of user.
     */
    public function usersVehicles()
    {
        return $this->hasMany('App\UserVehicle');
    }

    /**
     * Get the user's friends.
     */
    public function friends()
    {
        return $this->hasMany('App\Friend');
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
     * Get the user's Club subscribes.
     */
    public function subscribesToClubs()
    {
        return $this->morphedByMany('App\Club', 'subscrable');
    }

     /**
     * Get the user's Group subscribes.
     */
    public function subscribesToGroups()
    {
        return $this->morphedByMany('App\Group', 'subscrable');
    }

    /**
     * Get the user's Users subscribes.
     */
    public function subscribesToUsers()
    {
        return $this->morphedByMany('App\User', 'subscrable');
    }

    public function users()
    {
        return $this->morphToMany('App\User', 'subscrable');
    }

    /**
     * Get the user's Post.
     */
    public function posts()
    {
        return $this->morphMany('App\Post', 'postable');
    }

    /**
     * Get the user's Comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'authorable');
    }

    /**
     * Get the User's Likes.
     */
    public function likes()
    {
        return $this->morphMany('App\Like', 'authorable');
    }

    /**
     * Get the User's Images.
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function removeAvatar()
    {
        Storage::delete($this->avatar);
    }

    public function getFullNameAttribute() {
        return "{$this->name} {$this->surname}";
    }

    public function getLocationAttribute()
    {
        return "$this->city $this->country";
    }


}
