<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserVehicle
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $vehicle_bd
 * @property string|null $description
 * @property string|null $avatar
 * @property int $user_id
 * @property-read mixed $full_vehicle_name
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVehicle whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVehicle whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVehicle whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVehicle whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVehicle whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVehicle whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserVehicle whereVehicleBd($value)
 * @mixin \Eloquent
 */
class UserVehicle extends Model
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

    protected $appends = [
        'full_vehicle_name',
    ];


    /**
     * Get the user who have this vehicle.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getFullVehicleNameAttribute() {
        return "{$this->brand} {$this->model} {$this->vehicle_bd} года";
    }
}
