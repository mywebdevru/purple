<?php

namespace App\Providers;


use App\Models\Message;
use App\Models\User;
use App\Observers\MessageObserver;
use App\Observers\UserObserver;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Console\Commands\ModelMakeCommand;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Map;
use App\Observers\PostObserver;
use App\Observers\CommentObserver;
use App\Observers\MapObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Auto set path to App\Model\ when Model creating
         */
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
        User::observe(UserObserver::class);
        Map::observe(MapObserver::class);
        Post::observe(PostObserver::class);
        Comment::observe(CommentObserver::class);
        Message::observe(MessageObserver::class);
    }
}
