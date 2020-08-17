<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Subscrable
 *
 * @property int $id
 * @property int $user_id
 * @property int $subscrable_id
 * @property string $subscrable_type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscrable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscrable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscrable query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscrable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscrable whereSubscrableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscrable whereSubscrableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscrable whereUserId($value)
 * @mixin \Eloquent
 */
class Subscrable extends Model
{
    public $timestamps = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'subscrable_id', 'subscrable_type'
    ];


    /**
     * Get.
     */
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }

    public function subscrable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongTo();
    }
}
