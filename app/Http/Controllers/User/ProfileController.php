<?php

namespace App\Http\Controllers\User;

use App\Models\Feed;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Image;
use App\Models\Club;
use App\Models\Group;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $id=$user->id;
        if (!!auth()->user() && auth()->user()->id == $id) {
            $groups = $user->subscribes()->where('subscrable_type', Group::class)->pluck('subscrable_id');
            $users = $user->subscribes()->where('subscrable_type', User::class)->pluck('subscrable_id');
            $clubs = $user->subscribes()->where('subscrable_type', Club::class)->pluck('subscrable_id');
            $feed = Feed::where(function ($query) use ($users){
                return $query->where('authorable_type', [User::class])->whereIn('authorable_id', $users);
                })->orWhere(function ($query) use ($clubs){
                    return $query->where('authorable_type', [Club::class])->whereIn('authorable_id', $clubs);
                })->orWhere(function ($query) use ($groups){
                        return $query->where('authorable_type', [Group::class])->whereIn('authorable_id', $groups);
                })->orderBy('updated_at','DESC');
            $user = auth()->user();
        } else {
            $feed = Feed::where('authorable_type', [User::class])->where('authorable_id', $id)->orderBy('updated_at','DESC');
        }
        $user->load('usersVehicles', 'images', 'friends.user');
        $feed->with('feedable.postable')
                ->with('feedable.comments.authorable')
                ->with('feedable.comments.likes')
                ->with('feedable.likes.authorable');
        return view('user.prof',['user' => $user, 'feed' => $feed->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        if(Str::contains(url()->current(), 'secure')){
            return view('user.components.edit_profile.secure');
        }
        return view('user.components.edit_profile.personal',['profile'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->cannot('update', auth()->user())){
            abort(403, 'Вы не можете редактировать данные '.$user->full_name);
        }
        $data = $request->except('_token');
        $save = $user->fill($data)->save();
        abort_if(!$save, 500);
        return redirect()->route('user.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
        //
    }
}
