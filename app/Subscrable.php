<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
