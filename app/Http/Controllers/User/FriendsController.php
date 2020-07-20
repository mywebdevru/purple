<?php

namespace App\Http\Controllers\User;

use App\Friend;
use App\FriendshipRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Subscrable;
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
     * @param  \App\Friend  $friends
     * @param  \App\Subscrable $subcrable
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Friend $friends, Subscrable $subcrable, $user)
    {
        if (!!$request->user_id && !!$request->friend_id) {
            $result1 = $friends->create(
                ['user_id' => $request->user_id,'friend_id' => $request->friend_id] // add record to Friend table
            );
            $result1_2 = $subcrable->create(
                ['user_id' => $request->user_id,'subscrable_id' => $request->friend_id, 'subscrable_type' => 'App\User' ] // subscribe each other
            );
            $result2 = $friends->create(
                ['user_id' => $request->friend_id,'friend_id' => $request->user_id] // add record to Friend table
            );
            $result2_2 = $subcrable->create(
                ['user_id' => $request->friend_id,'subscrable_id' => $request->user_id, 'subscrable_type' => 'App\User' ] // subscribe each other
            );
        }
        // if (!$result1 || !$result2 || !$result1_2 || !$result2_2) {
        //     return response()->json(['error' => 'Что то пошло не так']);
        // }
        FriendshipRequest::where('user_id', $request->user_id)->where('friend_id', $request->friend_id)->delete(); // delete friendship request
        // return response()->json(['success' => 'У Вас новый друг!']);
        return redirect()->route('user.show', ['user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friend  $friends
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friends)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend  $friends
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friends)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friend  $friends
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
    /*public function destroy(Friend $friends, Request $request, Subscrable $subcrable)
    {
        if (!!$request->user_id && !!$request->friend_id == 'request') {
            $friends->where('user_id', $request->user_id)->where('friend_id', $request->friend_id)->delete();
            $friends->where('user_id', $request->friend_id)->where('friend_id', $request->user_id)->delete();
            $subcrable->where('user_id', $request->user_id)->where('subscrable_id', $request->friend_id)->delete();
            $subcrable->where('user_id', $request->friend_id)->where('subscrable_id', $request->user_id)->delete();
        }
        return response()->json(['success' => 'Вы больше не друзья!']);
    }*/

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
            $userSubscribe->subscribesToUsers()->detach($friend->friend_id)?:$error = true;
            $friendSubscribe->subscribesToUsers()->detach($friend->user_id)?:$error = true;
            abort_if($error, 500);
        });

        session()->flash('success', 'Пользователь больше не дружит с ' . $friend->user->full_name);
        return back();
    }
}
