<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shared\SummernoteController;
use App\Http\Livewire\Main;
use App\Http\Livewire\Main\Map;
use App\Http\Livewire\Main\UsersMaps;
use App\Http\Livewire\CreateNew\NewMap;


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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::middleware('auth')->get('/home', 'HomeController@index')->name('home');

Route::resource('group', 'Group\GroupController');
Route::resource('club', 'Club\ClubController');

Route::get('/admin/{any?}', 'HomeController@admin')->where('any', '^[\/\w\.-]*')->middleware(['auth', 'role:admin|super-admin']);

Route::post('summernote/upload', [SummernoteController::class, 'upload'])->name('summernote.upload');
Route::post('summernote/delete', [SummernoteController::class, 'delete'])->name('summernote.delete');

Route::group(['prefix'=>'maps', 'namespace'=>'Map'], function(){
    Route::resource('/map', 'MapController');
});

Route::group([
    'namespace' => 'User',
    'prefix' => 'user',
    'middleware' => 'auth',
    'as' => 'user.edit.'
], function () {
    Route::get('{user}/edit/secure', 'ProfileController@edit')->name('secure');
});

Route::get('/user/{user}', [Main::class, '__invoke'])->name('user.show')->middleware('auth');
Route::get('/user/{user}/maps', [UsersMaps::class, '__invoke'])->name('user.maps')->middleware('auth');
Route::get('/user/{user}/{action}/map/{map}', [NewMap::class, '__invoke'])->name('user.map.edit')->middleware('auth');
Route::get('/user/{user}/map/{map}/{mode}', [Map::class, '__invoke'])->name('user.map.show')->middleware('auth');

Route::group([
    'namespace' => 'User',
    'prefix' => 'user',
    'middleware' => 'auth',
    'as' => 'user.'
], function () {
    Route::get('{user}/edit/personal', 'PersonalInfoController@edit')->name('edit');
    Route::put('edit/personal/{user}', 'PersonalInfoController@update')->name('personal.update');
    // Route::get('{user}/edit/vehicles', 'VehicleController@edit')->name('vehicles');
    // Route::put('edit/vehicles/{vehicle}', 'VehicleController@update')->name('vehicles.update');
    // Route::post('edit/vehicles', 'VehicleController@store')->name('vehicles.store');
    // Route::delete('edit/vehicles/{vehicle}', 'VehicleController@destroy')->name('vehicles.destroy');
    // Route::get('{user}/edit/maps', 'MapController@edit')->name('maps');
    // Route::put('edit/maps/{map}', 'MapController@update')->name('maps.update');
    // Route::post('edit/maps', 'MapController@store')->name('maps.store');
    // Route::delete('edit/maps/{map}', 'MapController@destroy')->name('maps.destroy');
    // Route::get('{user}/edit/clubs', 'ClubController@edit')->name('clubs');
    // Route::put('edit/clubs/{club}', 'ClubController@update')->name('clubs.update');
    // Route::post('edit/clubs', 'ClubController@store')->name('clubs.store');
    // Route::delete('{user}/edit/clubs', 'ClubController@destroy')->name('clubs.destroy');
    // Route::get('{user}/edit/groups', 'GroupController@edit')->name('groups');
    // Route::put('edit/groups/{group}', 'GroupController@update')->name('groups.update');
    // Route::post('{user}/edit/groups', 'GroupController@store')->name('groups.store');
    // Route::delete('edit/groups/{group}', 'GroupController@destroy')->name('groups.destroy');
    Route::get('{user}/edit/friends', 'FriendsController@edit')->name('friends');
    Route::post('edit/friends', 'FriendsController@store')->name('friends.store');
    Route::delete('edit/friends/{friend}', 'FriendsController@destroy')->name('friends.destroy');
    Route::resource('friendship_request', 'FriendshipRequestController');
});

Route::post('/push','PushController');
