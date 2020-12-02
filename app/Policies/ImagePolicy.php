<?php

namespace App\Policies;

use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Image  $image
     * @return mixed
     */
    public function view(User $user, Image $image)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id === auth()->user()->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Image  $image
     * @return mixed
     */
    public function update(?User $user, Image $image)
    {
        if(!$user){
            return false;
        }
        if($user->id != auth()->user()->id){
            return false;
        }
        return $user->id === $image->imageable()->first()->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Image  $image
     * @return mixed
     */
    public function delete(User $user, Image $image)
    {
        if(!$user){
            return false;
        }
        if($user->id != auth()->user()->id){
            return false;
        }
        return $user->id === $image->imageable()->first()->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Image  $image
     * @return mixed
     */
    public function restore(User $user, Image $image)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Image  $image
     * @return mixed
     */
    public function forceDelete(User $user, Image $image)
    {
        if(!$user){
            return false;
        }
        if($user->id != auth()->user()->id){
            return false;
        }
        return $user->id === $image->imageable()->first()->id;
    }
}
