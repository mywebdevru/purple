<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UserVehicle
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
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserVehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserVehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserVehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserVehicle whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserVehicle whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserVehicle whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserVehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserVehicle whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserVehicle whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserVehicle whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserVehicle whereVehicleBd($value)
 * @mixin \Eloquent
 */
class UserVehicle extends Model
{
    use HasFactory;

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

    protected $touches = ['user'];

    /**
     * Get the user who have this vehicle.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFullVehicleNameAttribute(): string
    {
        return "{$this->brand} {$this->model} {$this->vehicle_bd} года";
    }
}
