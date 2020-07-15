<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    public $timestamps = true;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'friend_id',
    ];


    /**
     * Get the user who have this fiend.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'friend_id');
    }
}
