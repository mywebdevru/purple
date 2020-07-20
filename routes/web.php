<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\FriendsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'User\ProfileController');
// Route::post('user/friendship_request', 'User\FriendshipRequestController@store');
Route::delete('user/friendship_reject/{user}', 'User\FriendshipRequestController@destroy')->name('user.friendship_reject');
Route::put('user/friendship_confirm/{user}', 'User\FriendsController@store')->name('user.friendship_confirm');
//Route::delete('user/friendship_delete', 'User\FriendsController@destroy');
Route::delete('friend/{friend}', [FriendsController::class, 'destroy'])->name('friend.delete');
Route::resource('post', 'Post\PostController');

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => 'auth',
    'as' => 'admin.'
], function () {
    Route::resource('user', 'UserController');
    Route::resource('post', 'PostController');
    Route::resource('friend', 'FriendController')->only(['destroy']);
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

Route::get('edit-profile', function () {
    return view('user/user_profile');
});

