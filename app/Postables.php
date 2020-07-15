<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Postables
 *
 * @property int $id
 * @property int $posts_id
 * @property int $postable_id
 * @property string $postable_type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postables newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postables newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postables query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postables whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postables wherePostableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postables wherePostableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postables wherePostsId($value)
 * @mixin \Eloquent
 */
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
