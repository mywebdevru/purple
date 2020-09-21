<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Notification\NotificationResourceCollection;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return new NotificationResourceCollection(auth()->user()->notifications);
    }

    public function unread()
    {
        return new NotificationResourceCollection(auth()->user()->unreadNotifications->splice(0, 5));
    }

    public function unreadCount()
    {
        return response()->json([
            'title' => 'Unread notifications count',
            'count' => (new NotificationResourceCollection(auth()->user()->unreadNotifications))->count(),
        ]);
    }
}
