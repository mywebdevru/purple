<?php

namespace App\Http\Controllers\User;

use App\Feed;
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
        $id=$user->id;
        if (!!auth()->user() && auth()->user()->id == $id) {
            $subscribesToUsers = $user->subscribesToUsers()->pluck('subscrable_id');
            $subscribesToClubs = $user->subscribesToClubs()->pluck('subscrable_id');
            $subscribesToGroups = $user->subscribesToGroups()->pluck('subscrable_id');
            $feed = Feed::whereHasMorph('feedable', ['App\Post'], function (Builder $query, $type) use ($subscribesToUsers) {
                return $query->whereIn('postable_id', $subscribesToUsers)
                            ->where('postable_type', 'App\User');
            })->orWhereHasMorph('feedable', ['App\Post'], function (Builder $query) use ($id) {
                return $query->where('postable_id', $id)
                            ->where('postable_type', 'App\User');
            })->orWhereHasMorph('feedable', ['App\Post'], function (Builder $query) use ($subscribesToClubs) {
                return $query->whereIn('postable_id', $subscribesToClubs)
                            ->where('postable_type', 'App\Club');
            })->orWhereHasMorph('feedable', ['App\Post'], function (Builder $query) use ($subscribesToGroups) {
                return $query->whereIn('postable_id', $subscribesToGroups)
                            ->where('postable_type', 'App\Group');
            })->orWhereHasMorph('feedable', ['App\Image'], function (Builder $query) use ($subscribesToUsers) {
                return $query->whereIn('imageable_id', $subscribesToUsers)
                            ->where('imageable_type', 'App\User');
            })->orWhereHasMorph('feedable', ['App\Image'], function (Builder $query) use ($id) {
                return $query->where('imageable_id', $id)
                            ->where('imageable_type', 'App\User');
            })->orWhereHasMorph('feedable', ['App\Image'], function (Builder $query) use ($subscribesToClubs) {
                return $query->whereIn('imageable_id', $subscribesToClubs)
                            ->where('imageable_type', 'App\Club');
            })->orWhereHasMorph('feedable', ['App\Image'], function (Builder $query) use ($subscribesToGroups) {
                return $query->whereIn('imageable_id', $subscribesToGroups)
                            ->where('imageable_type', 'App\Group');
            })->orderBy('updated_at', 'desc')->get();
            $user->load('usersVehicles', 'friends.user', 'friendshipRequests.friend', 'requestedFriendships.user', 'images');
            $user->loadCount('friendshipRequests');
            $authUser = $user;
        } else {
            $feed = Feed::whereHasMorph('feedable', ['App\Post'], function (Builder $query, $type) use ($id) {
                return $query->where('postable_id', $id)
                            ->where('postable_type', 'App\User');
                        })->orWhereHasMorph('feedable', ['App\Image'], function (Builder $query) use ($id) {
                            return $query->where('imageable_id', $id)
                                        ->where('imageable_type', 'App\User');
                        })->orderBy('updated_at', 'desc')->get();
            $user->load('usersVehicles', 'friends.user', 'images');
            if(!!auth()->user()){
                $authUser = User::find(auth()->user()->id);
                $authUser->loadCount('friendshipRequests');
                $authUser->load('friendshipRequests.friend');
            } else { $authUser = []; }
        }
        $feed->loadMorph('feedable.imageable', ['App\Image']);
        $feed->loadMorph('feedable.postable', ['App\Post']);
        return view('user.prof',['data' => $user, 'feed' => $feed, 'user' => $authUser]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $users)
    {
        return view('user.edit')->with('user', auth()->user());
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
