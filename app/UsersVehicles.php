<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersVehicles extends Model
{
    public $timestamps = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'brand', 'model', 'vehicle_bd', 'user_id', 'description', 'avatar',
    ];


    /**
     * Get the user who have this vehicle.
     */
    public function user()
    {
        return $this->belongsTo('App/User');
    }
}
