<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $body
 * @property int $user_id
 * @property int $recipient_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $recipient
 * @property-read \App\Models\User $user
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 * @method static Builder|Message whereBody($value)
 * @method static Builder|Message whereCreatedAt($value)
 * @method static Builder|Message whereId($value)
 * @method static Builder|Message whereRecipientId($value)
 * @method static Builder|Message whereUpdatedAt($value)
 * @method static Builder|Message whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $read_at
 * @method static Builder|Message whereReadAt($value)
 */
class Message extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recipient_id', 'id');
    }

    /**
     * @param $recipientId
     * @return Builder
     */
    private static function chatMessagesQuery($recipientId): Builder
    {
        return (new static())::where(function ($query) use ($recipientId) {
            return $query->where([
                'user_id' => auth()->user()->id,
                'recipient_id' => $recipientId,
            ]);
        })
            ->orWhere(function ($query) use ($recipientId) {
                return $query->where([
                    'user_id' => $recipientId,
                    'recipient_id' => auth()->user()->id,
                ]);
            });
    }

    public static function chatMessages($recipientId)
    {
        return static::chatMessagesQuery($recipientId)->get();
    }

    public static function chatMessagesCount($recipientId): int
    {
        return static::chatMessagesQuery($recipientId)->count();
    }

    public static function chatUnreadMessagesCount($recipientId): int
    {
        $friend = User::find($recipientId);

        return $friend->messages()
            ->where(['recipient_id' => auth()->user()->id, 'read_at' => null])
            ->count();
    }
}
