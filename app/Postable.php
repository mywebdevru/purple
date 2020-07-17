<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Postable
 *
 * @property int $id
 * @property int $posts_id
 * @property int $postable_id
 * @property string $postable_type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postable query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postable wherePostableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postable wherePostableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Postable wherePostsId($value)
 * @mixin \Eloquent
 */
class Postable extends Model
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
