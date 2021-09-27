<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Models\Subscrable;
use App\Models\Post;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Feed;

/**
 * App\Models\Group
 *
 * @property int $id
 * @property string $name
 * @property string|null $avatar
 * @property string|null $creed Девиз по жизни
 * @property string|null $description Описание
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereCreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $full_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $image
 * @property-read int|null $image_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Feed[] $feeds
 * @property-read int|null $feeds_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subscrable[] $subscribers
 * @property-read int|null $subscribers_count
 */
class Group extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'creed', 'description',
    ];

    protected $appends = [
        'full_name'
    ];


    /**
     * Get the users who have subscribe to this Group.
     */
    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'subscrable');
    }

    public function subscribers(): MorphMany
    {
        return $this->morphMany(Subscrable::class, 'subscrable');
    }

    /**
     * Get the Group's's Post.
     */
    public function posts(): MorphMany
    {
        return $this->morphMany(Post::class, 'postable');
    }

    /**
     * Get the Group's's Images.
     */
    public function image(): MorphMany
    {
        return $this->morphMany(Image::class, 'postable');
    }

    /**
     * Get the Group's Comments.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'authorable');
    }

    /**
     * Get the Group's Likes.
     */
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'authorable');
    }

    public function feeds(): MorphMany
    {
        return $this->morphMany(Feed::class, 'authorable');
    }

    public function getFullNameAttribute(): string
    {
        return "Сообщество $this->name";
    }
}
