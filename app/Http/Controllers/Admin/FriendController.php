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
        $secondRecord = Friend::where([['user_id', '=', $friend->friend_id], ['friend_id', '=', $friend->user_id]])->first();
        $user = User::find($friend->user_id);
        $usersFriend = User::find($friend->friend_id);
        if(!$secondRecord || !$user || !$usersFriend) {
            abort(404);
        }
        DB::transaction(function () use ($friend, $secondRecord, $user, $usersFriend) {
            $error = 0;
            $user->subscribesToUsers()->detach($usersFriend) ?: $error = 1;
            $usersFriend->subscribesToUsers()->detach($user) ?: $error = 1;
            $secondRecord->forceDelete() ?: $error = 1;
            $friend->forceDelete() ?: $error = 1;;
            abort_if($error, 500);
        });

        session()->flash('success', 'Пользователь больше не дружит с ' . $friend->user->full_name);

        return redirect(route('admin.user.index'));
    }
}
