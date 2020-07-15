<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postables extends Model
{
    public $timestamps = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'posts_id', 'postable_id', 'postable_type'
    ];


    /**
     * Get.
     */
    // public function post()
    // {
    //     return $this->belongsTo('App\Post');
    // }
}
