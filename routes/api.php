<?php

use App\Http\Controllers\Admin\DashboardDataController;
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
    Route::get('/users-count', [DashboardDataController::class, 'usersCount'])->name('dashboard.users');
    Route::get('/members-count', [DashboardDataController::class, 'membersCount'])->name('dashboard.members');
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
});
