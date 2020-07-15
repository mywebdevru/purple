<?php

namespace App\Http\Controllers\User;

use App\FriendshipRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FriendshipRequestController extends Controller
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
    public function store(Request $request, FriendshipRequest $friendshipRequest)
    {
        if (!!$request->user_id && !!$request->friend_id) {
            $result = $friendshipRequest->create(['user_id' => $request->user_id,'friend_id' => $request->friend_id]);
        } else {
            return response()->json(['error' => 'Нет запроса на дружбу']);
        }
        if (!$result){
            return response()->json(['error' => 'Что то пошло не так!']);
        }
        return response()->json(['success' => 'Запрос отправлен!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function show(FriendshipRequest $friendshipRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(FriendshipRequest $friendshipRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FriendshipRequest $friendshipRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FriendshipRequest $friendshipRequest, $user)
    {
        if (!!$request->user_id && !!$request->friend_id) {
           $result = $friendshipRequest->where('user_id', $request->user_id)->where('friend_id', $request->friend_id)->delete();
        }
        // dd($request);
        // if (!$result){
        //     return response()->json(['error' => 'Что то пошло не так!']);
        // }
        // return response()->json(['success' => 'Дружба отклонена!']);
        return redirect()->route('user.show', ['user' => $user]);
    }
}
