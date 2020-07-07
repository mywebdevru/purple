<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

     /**
     * Get the vehicles of user.
     */
    public function usersVehicles()
    {
        return $this->hasMany('App\UsersVehicles');
    }

    public function friends1()
    {
        return $this->hasMany('App\Friends', 'user1_id');
    }
    public function friends2()
    {
        return $this->hasMany('App\Friends', 'user2_id');
    }
}
