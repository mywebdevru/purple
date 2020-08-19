<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use App\Policies\ImagePolicy;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class,
        Image::class => ImagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "Super Admin" role all permission checks using can()
        \Gate::before(function ($user, $ability) {
            if ($user->hasRole('super-admin')) {
                return true;
            }
        });
    }
}
