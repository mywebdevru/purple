<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Like
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $likeable_id
 * @property string $likeable_type
 * @property int|null $authorable_id
 * @property string|null $authorable_type
 * @property-read Model|\Eloquent $authorable
 * @property-read Model|\Eloquent $likeable
 * @method static \Illuminate\Database\Eloquent\Builder|Like newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Like newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Like query()
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereAuthorableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereAuthorableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereLikeableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereLikeableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'likeable_id', 'likeable_type', 'authorable_id', 'authorable_type',
    ];

    public function likeable()
    {
        return $this->morphTo();
    }

    public function authorable()
    {
        return $this->morphTo('authorable');
    }

}
