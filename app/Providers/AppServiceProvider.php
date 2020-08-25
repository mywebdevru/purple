<?php

namespace App\Providers;


use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Console\Commands\ModelMakeCommand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->extend('command.model.make', function ($command, $app) {
            return new ModelMakeCommand($app['files']);
        });
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
