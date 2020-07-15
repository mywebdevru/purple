<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UsersVehicles
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersVehicles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersVehicles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersVehicles query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersVehicles whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersVehicles whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersVehicles whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersVehicles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersVehicles whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersVehicles whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersVehicles whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsersVehicles whereVehicleBd($value)
 * @mixin \Eloquent
 */
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
