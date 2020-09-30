<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\UserResourceCollection;
use App\Models\FriendshipRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return UserResourceCollection
     */
    public function index()
    {
        return new UserResourceCollection(User::all());
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
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        $userRequests = FriendshipRequest::where('user_id', $user->id)->get();
        $friendshipRequests = FriendshipRequest::where('friend_id', $user->id)->get();

        return view('admin.users.show')
            ->with('user', $user)
            ->with('friends', $user->friends)
            ->with('userRequests', $userRequests)
            ->with('friendshipRequests', $friendshipRequests)->with('vehicles', $user->usersVehicles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProfileRequest $request
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateProfileRequest $request, User $user)
    {
        $data = $request->only(['name', 'email', 'surname', 'country', 'city', 'creed', 'birth_date', 'gender' ]);

        if ($request->hasFile('avatar')) {
            $image = $request->avatar->store('avatars');
            $user->removeAvatar();
            $data['avatar'] = $image;
        }

        $user->update($data);

        session()->flash('success', 'Профиль пользователя обновлен');

        return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->forceDelete();

        session()->flash('success', 'Запись пользователя ' . $user->full_name . ' упешно удалена');

        return redirect()->back();
    }
}
