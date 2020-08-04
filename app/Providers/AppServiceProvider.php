<?php

namespace App\Providers;


use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale(config('app.locale'));

        // Using class based composers...
        View::composer(
            ['user.prof',
            'user.edit',
            'welcome',
            'user.components.edit_profile.clubs',
            'user.components.edit_profile.friends',
            'user.components.edit_profile.groups',
            'user.components.edit_profile.maps',
            'user.components.edit_profile.personal',
            'user.components.edit_profile.secure',
            'user.components.edit_profile.vehicles',
            'user.components.edit_profile.clubs',
            ], 'App\Http\View\Composers\ProfileComposer'
        );

        // Using Closure based composers...
        View::composer([
        'user.prof',
        'welcome',
        'user.edit',
        'user.components.edit_profile.clubs',
        'user.components.edit_profile.friends',
        'user.components.edit_profile.clubs',
        'user.components.edit_profile.maps',
        'user.components.edit_profile.groups',
        'user.components.edit_profile.secure',
        'user.components.edit_profile.personal',
        'user.components.edit_profile.vehicles',
       ], function ($view) {
            //
        });
    }
}
