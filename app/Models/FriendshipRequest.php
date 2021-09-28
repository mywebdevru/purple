<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use App\Models\User;

/**
 * App\Models\FriendshipRequest
 *
 * @property int $id
 * @property int $user_id
 * @property int $friend_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $friend
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest whereFriendId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipRequest whereUserId($value)
 * @mixin \Eloquent
 */
class FriendshipRequest extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'friend_id',
    ];


    /**
     * Get the user who have this vehicle.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function friend(): BelongsTo
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
