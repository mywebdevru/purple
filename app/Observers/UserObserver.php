<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\User\NewUserRegistered;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param User $user
     * @return void
     */
    public function created(User $user)
    {
        if(Role::where('name', 'admin')->count()) {
            Notification::send(User::role('admin')->get(), new NewUserRegistered($user));
        }
        if(Role::where('name', 'super-admin')->count()) {
            Notification::send(User::role('super-admin')->get(), new NewUserRegistered($user));
        }
    }

    /**
     * Handle the user "updated" event.
     *
     * @param User $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
