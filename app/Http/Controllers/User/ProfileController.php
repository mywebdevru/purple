<?php

namespace App\Http\Controllers\User;

use App\Models\Feed;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        $subscribes = $user->subscribes->mapToGroups(function ($item, $key) {
            return [$item['subscrable_type'] => $item['subscrable_id']];
        });
        $id=$user->id;
        if (!!auth()->user() && auth()->user()->id == $id) {
            $user = auth()->user();
            $feed = Feed::whereHasMorph('feedable', ['App\Models\Post'], function (Builder $query, $type) use ($subscribes) {
                return $query->whereIn('postable_id', $subscribes['App\Models\User'])
                            ->where('postable_type', 'App\Models\User');
            })->orWhereHasMorph('feedable', ['App\Models\Post'], function (Builder $query) use ($id) {
                return $query->where('postable_id', $id)
                            ->where('postable_type', 'App\Models\User');
            })->orWhereHasMorph('feedable', ['App\Models\Post'], function (Builder $query) use ($subscribes) {
                return $query->whereIn('postable_id', $subscribes['App\Models\Club'])
                            ->where('postable_type', 'App\Models\Club');
            })->orWhereHasMorph('feedable', ['App\Models\Post'], function (Builder $query) use ($subscribes) {
                return $query->whereIn('postable_id', $subscribes['App\Models\Group'])
                            ->where('postable_type', 'App\Models\Group');
            })->orWhereHasMorph('feedable', ['App\Models\Image'], function (Builder $query) use ($subscribes) {
                return $query->whereIn('imageable_id', $subscribes['App\Models\User'])
                            ->where('imageable_type', 'App\Models\User');
            })->orWhereHasMorph('feedable', ['App\Models\Image'], function (Builder $query) use ($id) {
                return $query->where('imageable_id', $id)
                            ->where('imageable_type', 'App\Models\User');
            })->orWhereHasMorph('feedable', ['App\Models\Image'], function (Builder $query) use ($subscribes) {
                return $query->whereIn('imageable_id', $subscribes['App\Models\Club'])
                            ->where('imageable_type', 'App\Models\Club');
            })->orWhereHasMorph('feedable', ['App\Models\Image'], function (Builder $query) use ($subscribes) {
                return $query->whereIn('imageable_id', $subscribes['App\Models\Group'])
                            ->where('imageable_type', 'App\Models\Group');
            })->orderBy('updated_at', 'desc');
        } else {
            $feed = Feed::whereHasMorph('feedable', ['App\Models\Post'], function (Builder $query, $type) use ($id) {
                return $query->where('postable_id', $id)
                            ->where('postable_type', 'App\Models\User');
                        })->orWhereHasMorph('feedable', ['App\Models\Image'], function (Builder $query) use ($id) {
                            return $query->where('imageable_id', $id)
                                        ->where('imageable_type', 'App\Models\User');
                        })->orderBy('updated_at', 'desc');
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
