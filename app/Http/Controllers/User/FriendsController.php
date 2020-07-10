<?php

namespace App\Http\Controllers\User;

use App\Friends;
use App\FriendshipRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Friends $friends)
    {
        if (!!$request->user_id && !!$request->friend_id == 'request') {
            $result1 = $friends->create(
                ['user_id' => $request->user_id,'friend_id' => $request->friend_id],
            );
            $result2 = $friends->create(
                ['user_id' => $request->friend_id,'friend_id' => $request->user_id],
            );
        }
        if (!$result1 || !$result2) {
            return response()->json(['error' => 'Что то пошло не так']);
        }
        FriendshipRequest::where('user_id', $request->user_id)->where('friend_id', $request->friend_id)->delete();
        return response()->json(['success' => 'У Вас новый друг!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function show(Friends $friends)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function edit(Friends $friends)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friends $friends)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friends $friends, Request $request)
    {
        if (!!$request->user_id && !!$request->friend_id == 'request') {
            $friends->where('user_id', $request->user_id)->where('friend_id', $request->friend_id)->delete();
            $friends->where('user_id', $request->friend_id)->where('friend_id', $request->user_id)->delete();
        }
        return response()->json(['success' => 'Вы больше не друзья!']);
    }
}
