<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::post('user/friendship_request', 'User\FriendshipRequestController@store');
Route::post('user/friendship_reject', 'User\FriendshipRequestController@destroy');
Route::post('user/friendship_confirm', 'User\FriendsController@store');
Route::post('user/friendship_delete', 'User\FriendsController@destroy');


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::resource('users', 'UsersController');
});

Route::get('edit-profile', function () {
    return view('user/user_profile');
});
