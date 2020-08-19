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
            $user = auth()->user();
            $feed = Feed::whereHasMorph('feedable', [Post::class, Image::class], function ($query){
                return $query->whereHasMorph('postable', [Club::class, User::class, Group::class], function ($query){
                    return $query->whereHas('users', function ($query){
                        return $query->where('user_id', auth()->user()->id);
                    })->orWhere('id', auth()->user()->id);
                });
            })->orderBy('updated_at','DESC');
        } else {
            $feed = Feed::whereHasMorph('feedable', [Post::class, Image::class], function ($query) use ($id){
                return $query->whereHasMorph('postable', [User::class], function ($query) use ($id){
                    return $query->where('id', [$id]);
                });
            })->orderBy('updated_at','DESC');
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
