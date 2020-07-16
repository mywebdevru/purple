<?php

namespace App\Http\Controllers\User;

use App\Friends;
use App\FriendshipRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Subscrable;
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
     * @param  \App\Friends  $friends
     * @param  \App\Subscrable $subcrable
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Friends $friends, Subscrable $subcrable, $user)
    {
        if (!!$request->user_id && !!$request->friend_id) {
            $result1 = $friends->create(
                ['user_id' => $request->user_id,'friend_id' => $request->friend_id] // add record to Friends table
            );
            $result1_2 = $subcrable->create(
                ['user_id' => $request->user_id,'subscrable_id' => $request->friend_id, 'subscrable_type' => 'App\User' ] // subscribe each other
            );
            $result2 = $friends->create(
                ['user_id' => $request->friend_id,'friend_id' => $request->user_id] // add record to Friends table
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
     * @param Friends $friend
     * @return void
     */
    public function destroy(Friends $friends, Request $request, Subscrable $subcrable)
    {
        if (!!$request->user_id && !!$request->friend_id == 'request') {
            $friends->where('user_id', $request->user_id)->where('friend_id', $request->friend_id)->delete();
            $friends->where('user_id', $request->friend_id)->where('friend_id', $request->user_id)->delete();
            $subcrable->where('user_id', $request->user_id)->where('subscrable_id', $request->friend_id)->delete();
            $subcrable->where('user_id', $request->friend_id)->where('subscrable_id', $request->user_id)->delete();
        }
        return response()->json(['success' => 'Вы больше не друзья!']);
    }

    /*public function destroy(Friends $friend)
    {
        dump($friend);
        $secondRecord = Friends::where([['user_id', '=', $friend->friend_id], ['friend_id', '=', $friend->user_id]])->first();
        dd($secondRecord);
    }*/
}
