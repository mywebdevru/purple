<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    public $timestamps = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user1_id', 'user2_id', 'pending',
    ];


    /**
     * Get the user who have this fiend.
     */
    public function user1()
    {
        return $this->belongsTo('App\User', 'user1_id');
    }

    /**
     * Get the user who have this fiend.
     */
    public function user2()
    {
        return $this->belongsTo('App\User', 'user1_id');
    }
}
