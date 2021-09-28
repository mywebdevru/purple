<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Models\Feed;
use App\Models\Comment;
use App\Models\Like;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $imageable_id
 * @property string $imageable_type
 * @property string $image
 * @property-read \App\Models\Feed|null $feed
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $imageable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereImageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereImageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read Model|\Eloquent $postable
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereDescription($value)
 */
class Image extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imageable_id', 'imageable_type', 'image', 'description', 'position',
    ];

    protected $withCount = ['comments','likes'];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    public function feed(): MorphOne
    {
        return $this->morphOne(Feed::class, 'feedable');
    }

    /**
     * Get the Image's Comments.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get the Image's Likes.
     */
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
