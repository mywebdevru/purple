<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MapsPhoto
 *
 * @property int $id
 * @property int $map_id
 * @property string $filename
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Map $map
 * @method static \Illuminate\Database\Eloquent\Builder|MapsPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MapsPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MapsPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder|MapsPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsPhoto whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsPhoto whereMapId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapsPhoto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MapsPhoto extends Model
{
    protected $fillable = ['map_id', 'filename'];

    public function map()
    {
        return $this->belongsTo('App\Models\Map', 'map_id', 'id');
    }
}
