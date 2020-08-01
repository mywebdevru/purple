<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Subscrable
 *
 * @property int $id
 * @property int $user_id
 * @property int $subscrable_id
 * @property string $subscrable_type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscrable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscrable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscrable query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscrable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscrable whereSubscrableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscrable whereSubscrableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscrable whereUserId($value)
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
    //     return $this->belongsTo('App\User');
    // }
}
