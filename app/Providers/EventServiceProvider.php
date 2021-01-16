<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Log;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen([
            'eloquent.created: *',
            'eloquent.saved: *',
            'eloquent.updated: *',
            'eloquent.deleted: *',
        ], function($eventName, $object) {
            $ids = implode(', ', array_map(fn($item) => $item->id, $object));
            $userId = auth()->user()->id;
            Log::channel('daily-entity')->info("Event: $eventName | Model id: $ids | User: $userId");
        });
    }
}
