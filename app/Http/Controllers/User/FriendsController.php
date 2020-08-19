<?php

namespace App\Http\Controllers\User;

use App\Models\Friend;
use App\Models\FriendshipRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subscrable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Friend  $friends
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Friend $friends)
    {
        abort_if (!$request->requested_friendship, 403, 'Недостаточно данных');

        $friendship = json_decode($request->requested_friendship, true);

        if (isset($friendship['id'])) {
            $this->makeFriendTransactoin($friendship, $friends);
        } else {
            foreach ($friendship as $friendship) {
                $this->makeFriendTransactoin($friendship, $friends);
            }
        }
        session()->flash('success', 'У вас новый друг');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Friend  $friends
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friends)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Friend  $friends
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friends, User $user)
    {
        return view('user.components.edit_profile.friends')->with('profile', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Friend  $friends
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friends)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Friend $friend
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Friend $friend)
    {
        $secondRecord = Friend::where([['user_id', '=', $friend->friend_id], ['friend_id', '=', $friend->user_id]])->first();
        $userSubscribe = User::find($friend->user_id);
        $friendSubscribe = User::find($friend->friend_id);

        if(!$friend || !$secondRecord || !$userSubscribe || !$friendSubscribe) {
            abort(404);
        }
        DB::transaction(function () use ($friend, $secondRecord, $userSubscribe, $friendSubscribe) {
            $error = false;
            $friend->forceDelete()?:$error = true;
            $secondRecord->forceDelete()?:$error = true;
            $userSubscribe->subscribesToUsers()->detach($friend->friend_id);
            $friendSubscribe->subscribesToUsers()->detach($friend->user_id);
            abort_if($error, 500);
        });

        session()->flash('success', 'Пользователь больше не дружит с ' . $friend->user->full_name);
        return back();
    }

    private function makeFriendTransactoin($friendship, $friends)
    {
        DB::transaction(function () use ($friendship, $friends) {
            $error = false;
            $friends->create(['user_id' => $friendship['user_id'], 'friend_id' => $friendship['friend_id']])?:$error = true;
            $friends->create(['user_id' => $friendship['friend_id'],'friend_id' => $friendship['user_id']])?:$error = true;
            User::find($friendship['user_id'])->subscribesToUsers()->attach($friendship['friend_id']);
            User::find($friendship['friend_id'])->subscribesToUsers()->attach($friendship['user_id']);
            FriendshipRequest::find($friendship['id'])->delete()?:$error = true;
            abort_if($error, 500);
        });
    }
}
