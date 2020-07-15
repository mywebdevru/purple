<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'creed', 'description',
    ];


    /**
     * Get the users who have subscribe to this Groups.
     */
    public function users()
    {
        return $this->morphToMany('App\User', 'subscrable');
    }

    /**
     * Get the Group's's Posts.
     */
    public function posts()
    {
        return $this->morphToMany('App\Posts', 'postable');
    }
}
