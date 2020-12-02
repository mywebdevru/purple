<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Friend
 *
 * @property int $id
 * @property int $user_id
 * @property int $friend_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend whereFriendId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend whereUserId($value)
 * @mixin \Eloquent
 */
class Friend extends Model
{
    public $timestamps = true;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'friend_id',
    ];


    /**
     * Get the user who have this fiend.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'friend_id');
    }

    public static function makeFriends(User $user, User $anotherUser) : void
    {
        DB::transaction(function () use ($user, $anotherUser) {
            $user->friends()->create(['friend_id' => $anotherUser->id]);
            $anotherUser->friends()->create(['friend_id' => $user->id]);
        });
    }
}
