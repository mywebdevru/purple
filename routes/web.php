<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Shared\SummernoteController;
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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'User',
    // 'prefix' => 'user',
    'middleware' => 'auth',
    // 'as' => 'user.'
], function () {
    Route::resource('user', 'ProfileController');
    Route::resource('friendship_request', 'FriendshipRequestController');
    Route::resource('friend', 'FriendsController');
});


Route::resource('post', 'Post\PostController');
Route::resource('group', 'Group\GroupController');
Route::resource('club', 'Club\ClubController');

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => ['auth', 'role:admin|super-admin'],
    'as' => 'admin.'
], function () {
    Route::resource('user', 'UserController')->except(['create', 'store']);
    Route::resource('post', 'PostController')->except(['create', 'store']);
    Route::resource('friend', 'FriendController')->only(['destroy']);
    Route::resource('request', 'FriendshipRequestController')->only(['destroy']);
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

Route::post('summernote/upload', [SummernoteController::class, 'upload'])->name('summernote.upload');
Route::post('summernote/delete', [SummernoteController::class, 'delete'])->name('summernote.delete');

Route::get('edit-profile', function () {
    return view('user/user_profile');
});

Route::group(['prefix'=>'maps', 'namespace'=>'Maps'], function(){
    Route::get('/', 'ConstructController@map_constructor');
});

Route::group([
    'namespace' => 'User',
    'prefix' => 'user',
    'middleware' => 'auth',
    'as' => 'user.edit.'
], function () {
    Route::get('{user}/edit/secure', 'ProfileController@edit')->name('secure');
    Route::get('{user}/edit/maps', 'ProfileController@edit')->name('maps');
    Route::get('{user}/edit/personal', 'ProfileController@edit')->name('personal');
    Route::get('{user}/edit/clubs', 'ProfileController@edit')->name('clubs');
    Route::get('{user}/edit/groups', 'ProfileController@edit')->name('groups');
    Route::get('{user}/edit/friends', 'ProfileController@edit')->name('friends');
    Route::get('{user}/edit/vehicles', 'ProfileController@edit')->name('vehicles');
});
