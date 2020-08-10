<?php

namespace App\Http\View\Composers;

use App\User;
use Illuminate\View\View;

class ProfileComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(User $users)
    {
        // Dependencies automatically resolved by service container...
        $this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (!!auth()->user()){
            $user = $this->users->find(auth()->user()->id);
            $user->loadCount('requestedFriendships');
            $user->load('requestedFriendships.user', 'friendshipRequests', 'friends.user');
            $view->with('user', $user);
        }

    }
}
