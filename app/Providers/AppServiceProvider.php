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
            [
                'layouts.app', 'user.prof'

            ], 'App\Http\View\Composers\ProfileComposer'
        );

        // Using Closure based composers...
        View::composer([
            'layouts.app',
        ], function ($view) {
            //
        });
    }
}
