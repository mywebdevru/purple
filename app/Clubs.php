<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'birth_date', 'country', 'city', 'creed', 'description',
    ];


    /**
     * Get the users who have subscribe to this Clubs.
     */
    public function users()
    {
        return $this->morphToMany('App\User', 'subscrable');
    }

    /**
     * Get the Club's Posts.
     */
    public function posts()
    {
        return $this->morphToMany('App\Posts', 'postable');
    }
}
