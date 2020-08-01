<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Feed
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $feedable_id
 * @property string $feedable_type
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $feedable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed whereFeedableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed whereFeedableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feed whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Feed extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'feedable_id', 'feedable_type'
    ];

    public function feedable()
    {
        return $this->morphTo();
    }
}
