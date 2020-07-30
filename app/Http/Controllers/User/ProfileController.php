<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProfileController extends Controller
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $user->loadCount('posts', 'subscribesToClubs', 'subscribesToUsers', 'subscribesToGroups', 'friendshipRequests'); //Счетчики постов и подписок
        if (!!auth()->user() && auth()->user()->id == $user->id) {
            $id=$user->id;
            $subscribesToUsers = $user->subscribesToUsers()->pluck('subscrable_id');
            $subscribesToClubs = $user->subscribesToClubs()->pluck('subscrable_id');
            $subscribesToGroups = $user->subscribesToGroups()->pluck('subscrable_id');
            $posts = Post::where(function (Builder $query) use ($subscribesToUsers) {
                return $query->whereIn('postable_id', $subscribesToUsers)
                            ->where('postable_type', 'App\User');
            })->orWhere(function (Builder $query) use ($id) {
                return $query->where('postable_id', $id)
                            ->where('postable_type', 'App\User');
            })->orWhere(function (Builder $query) use ($subscribesToClubs) {
                return $query->whereIn('postable_id', $subscribesToClubs)
                            ->where('postable_type', 'App\Club');
            })->orWhere(function (Builder $query) use ($subscribesToGroups) {
                return $query->whereIn('postable_id', $subscribesToGroups)
                            ->where('postable_type', 'App\Group');
            })->orderBy('updated_at', 'desc')->get();
            $user->load('usersVehicles', 'friends.user', 'friendshipRequests.friend', 'requestedFriendships.user');
            $user->loadCount('friendshipRequests');
            $authUser = $user;
        } else {
            $posts = $user->posts()->orderBy('updated_at', 'desc');
            $posts = $user->posts()->orderBy('updated_at', 'desc')->get();
            $user->load('usersVehicles', 'friends.user');
            $authUser = User::find(auth()->user()->id);
            $authUser->loadCount('friendshipRequests');
            $authUser->load('friendshipRequests.friend');
        }
        $posts->load('postable');
        // dd($user->toArray());
        return view('user.prof',['data' => $user, 'posts' => $posts, 'user' => $authUser]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users)
    {
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->cannot('update', auth()->user())){
            abort(403, 'Вы не можете редактировать данные '.$user->full_name);
        }
        $data = $request->except('_token');
        $save = $user->fill($data)->save();
        return redirect()->route('user.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
        //
    }
}
