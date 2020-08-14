<?php

namespace App\Http\View\Composers;

use App\Repositories\UserRepository;
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
    public function __construct(UserRepository $userRepository)
    {
        // Dependencies automatically resolved by service container...
        $this->master = $userRepository->getMaster();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if ($this->master){
            $this->master->loadCount('requestedFriendships');
            $this->master->loadMissing('requestedFriendships.user', 'friendshipRequests', 'friends.user');
        }
        $view;
    }
}
