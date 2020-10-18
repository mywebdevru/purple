<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Friend[] $friends
 * @property-read int|null $friends_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FriendshipRequest[] $friendshipRequests
 * @property-read int|null $friendship_requests_count
 * @property-read mixed $full_name
 * @property-read mixed $location
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FriendshipRequest[] $requestedFriendships
 * @property-read int|null $requested_friendships_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Club[] $subscribesToClubs
 * @property-read int|null $subscribes_to_clubs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Group[] $subscribesToGroups
 * @property-read int|null $subscribes_to_groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $subscribesToUsers
 * @property-read int|null $subscribes_to_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserVehicle[] $usersVehicles
 * @property-read int|null $users_vehicles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $wallpaper
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereWallpaper($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Feed[] $feeds
 * @property-read int|null $feeds_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Map[] $maps
 * @property-read int|null $maps_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subscrable[] $subscribers
 * @property-read int|null $subscribers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subscrable[] $subscribes
 * @property-read int|null $subscribes_count
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles, HasApiTokens;

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
        return $this->hasMany('App\Models\UserVehicle');
    }

    /**
     * Get the user's friends.
     */
    public function friends()
    {
        return $this->hasMany('App\Models\Friend');
    }

    /**
     * Get the friendship requests that makes the user.
     */
    public function friendshipRequests()
    {
        return $this->hasMany('App\Models\FriendshipRequest');
    }

    /**
     * Get the friendship requests that the user get from other one.
     */
    public function requestedFriendships()
    {
        return $this->hasMany('App\Models\FriendshipRequest', 'friend_id');
    }

    /**
     * Get all user's subscribes.
     */
    public function subscribes()
    {
        return $this->hasMany('App\Models\Subscrable', 'user_id');
    }

    /**
     * Get the user's Club subscribes.
     */
    public function subscribesToClubs()
    {
        return $this->morphedByMany('App\Models\Club', 'subscrable');
    }

     /**
     * Get the user's Group subscribes.
     */
    public function subscribesToGroups()
    {
        return $this->morphedByMany('App\Models\Group', 'subscrable');
    }

    /**
     * Get the user's User subscribes.
     */
    public function subscribesToUsers()
    {
        return $this->morphedByMany('App\Models\User', 'subscrable');
    }

    /**
     * Get the Users who subscribed on user.
     */
    public function users()
    {
        return $this->morphToMany('App\Models\User', 'subscrable');
    }

    /**
     * Get the user's Post.
     */
    public function posts()
    {
        return $this->morphMany('App\Models\Post', 'postable');
    }

    /**
     * Get the user's Comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'authorable');
    }

    /**
     * Get the User's Likes.
     */
    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'authorable');
    }

    /**
     * Get the User's Images.
     */
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function feeds()
    {
        return $this->morphMany('App\Models\Feed', 'authorable');
    }

    public function subscribers()
    {
        return $this->morphMany('App\Models\Subscrable', 'subscrable');
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

    public function maps()
    {
        return $this->hasMany('App\Models\Map');
    }

    public function getAvatarAttribute($value)
    {
        return $value ? (Str::startsWith($value , 'http') ? $value : asset($value)) : asset('img/default-avatar.jpg');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
