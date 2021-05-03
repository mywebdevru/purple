<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PlaceMark
 *
 * @property int $id
 * @property int $map_id
 * @property int|null $number
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|PlaceMark newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlaceMark newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlaceMark query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlaceMark whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlaceMark whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlaceMark whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlaceMark whereMapId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlaceMark whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlaceMark whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PlaceMark extends Model
{
    protected $fillable = [
        'number',
        'description',
    ];

    public function map()
    {
        return $this->belongTo('App\Models\Map', 'map_id');
    }

    /**
     * Get the PlaceMark's Images.
     */
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}
