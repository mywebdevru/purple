<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereRecipientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUserId($value)
 * @mixin \Eloquent
 */
class Message extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id', 'id');
    }

    /**
     * @param $recipientId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private static function chatMessagesQuery($recipientId)
    {
        return (new static())->where(function ($query) use ($recipientId) {
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

    public static function chatMessagesCount($recipientId)
    {
        return static::chatMessagesQuery($recipientId)->count();
    }

    public static function chatUnreadMessagesCount($recipientId)
    {
        /*$sub = static::chatMessagesQuery($recipientId);
        return DB::table( DB::raw("({$sub->toSql()}) as sub") )
            ->mergeBindings($sub->getQuery())
            ->whereNull('read_at')
            ->get();*/

        return (new static())->where(function () use ($recipientId) {
            return static::chatMessagesQuery($recipientId);
        })->whereNull('read_at')->count();
    }
}
