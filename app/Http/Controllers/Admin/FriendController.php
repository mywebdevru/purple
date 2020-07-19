<?php

namespace App\Http\Controllers\Admin;

use App\Friend;
use App\Http\Controllers\Controller;
use App\Subscrable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Friend $friend)
    {
        /*$secondRecord = Friend::where([['user_id', '=', $friend->friend_id], ['friend_id', '=', $friend->user_id]])->first();
        $userSubscribe = Subscrable::where([['user_id', '=', $friend->user_id], ['subscrable_id', '=', $friend->friend_id]])->first();
        $friendSubscribe = Subscrable::where([['user_id', '=', $friend->friend_id], ['subscrable_id', '=', $friend->user_id]])->first();
        if(!$friend || !$secondRecord || !$userSubscribe || !$friendSubscribe) {
            abort(404);
        }
        DB::transaction(function () use ($friend, $secondRecord, $userSubscribe, $friendSubscribe) {
            $secondRecord->forceDelete();
            $userSubscribe->forceDelete();
            $friendSubscribe->forceDelete();
            $friend->forceDelete();
        });*/

        $secondRecord = Friend::where([['user_id', '=', $friend->friend_id], ['friend_id', '=', $friend->user_id]])->first();
        $user = User::find($friend->user_id);
        $users_friend = User::find($friend->friend_id);
        if(!$friend || !$secondRecord || !$user || !$users_friend) {
            abort(404);
        }
        DB::transaction(function () use ($friend, $secondRecord, $user, $users_friend) {
            $user->subscribesToUsers()->detach($friend->friend_id);
            $users_friend->subscribesToUsers()->detach($friend->user_id);
            $secondRecord->forceDelete();
            $friend->forceDelete();
        });

        session()->flash('success', 'Пользователь больше не дружит с ' . $friend->user->full_name);

        return redirect(route('admin.user.index'));
    }
}
