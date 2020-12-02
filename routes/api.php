<?php

use App\Http\Controllers\Admin\DashboardDataController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['role:admin|super-admin', 'auth:api'],
], function () {
    Route::apiResource('users', 'UserController')->only('index', 'destroy');
    Route::get('/users-count', [DashboardDataController::class, 'usersCount'])->name('dashboard.users');
    Route::get('/members-count', [DashboardDataController::class, 'membersCount'])->name('dashboard.members');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/unread', [NotificationController::class, 'unread'])->name('notifications.unread');
    Route::get('/notifications/unread-count', [NotificationController::class, 'unreadCount'])->name('notifications.unread_count');
    Route::get('/notifications/all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.all-read');
});

Route::group([
    'namespace' => 'API',
    'as' => 'api.',
    'middleware' => ['auth:api'],
], function () {
    Route::post('/profile/upload', 'ProfileController@upload')->name('profile.upload');
    Route::get('/profile/{user}', 'ProfileController@data')->name('profile.data');
    Route::put('/profile/{user}', 'ProfileController@save')->name('profile.save');
    Route::get('/auth-user', 'AuthUserController')->name('auth-user');
    Route::get('/auth-user-friends', 'AuthUserFriendsController')->name('auth-user-friends');
    Route::get('/mark-chat-is-read', 'MarkChatIsReadController')->name('mark-chat-is-read');
    Route::apiResource('messages', 'MessageController');
});
