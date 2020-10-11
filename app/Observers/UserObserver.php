<?php

namespace App\Observers;

use App\Events\AdminPanelRealtimeNotification;
use App\Models\User;
use App\Notifications\User\UserCreated;
use App\Notifications\User\UserDeleted;
use App\Notifications\User\UserUpdated;
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
            Notification::send(User::role('admin')->get(), new UserCreated($user));
        }
        if(Role::where('name', 'super-admin')->count()) {
            Notification::send(User::role('super-admin')->get(), new UserCreated($user));
        }
        event(new AdminPanelRealtimeNotification('Создан пользователь ' . $user->email));
    }

    /**
     * Handle the user "updated" event.
     *
     * @param User $user
     * @return void
     */
    public function updated(User $user)
    {
        if(Role::where('name', 'admin')->count()) {
            Notification::send(User::role('admin')->get(), new UserUpdated($user));
        }
        if(Role::where('name', 'super-admin')->count()) {
            Notification::send(User::role('super-admin')->get(), new UserUpdated($user));
        }
        event(new AdminPanelRealtimeNotification('Профиль пользователя ' . $user->email . ' обновлен'));
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function deleted(User $user)
    {
        if(Role::where('name', 'admin')->count()) {
            Notification::send(User::role('admin')->get(), new UserDeleted($user));
        }
        if(Role::where('name', 'super-admin')->count()) {
            Notification::send(User::role('super-admin')->get(), new UserDeleted($user));
        }
        event(new AdminPanelRealtimeNotification('Удален пользователь ' . $user->email));
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
        if(Role::where('name', 'admin')->count()) {
            Notification::send(User::role('admin')->get(), new UserDeleted($user));
        }
        if(Role::where('name', 'super-admin')->count()) {
            Notification::send(User::role('super-admin')->get(), new UserDeleted($user));
        }
        event(new AdminPanelRealtimeNotification('Удален пользователь ' . $user->email));
    }
}
