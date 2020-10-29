<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResourceCollection;
use App\Models\User;
use Illuminate\Http\Request;

class MarkChatIsReadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return UserResourceCollection
     */
    public function __invoke(Request $request)
    {
        $data = request()->validate([
            'recipient_id' => ''
        ]);

        $friend = User::find($data['recipient_id']);
        $friend->unreadChatMessages()->update([
            'read_at' => now(),
        ]);
        return new UserResourceCollection(auth()->user()->friendsUsers);
    }
}
