<?php

use App\Http\Controllers\UserController;
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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::resource('users', 'UsersController');
});

Route::get('edit-profile', function () {
    return view('user/user_profile');
});

Route::group(['prefix'=>'maps', 'namespace'=>'Maps'], function(){
    Route::get('/', 'ConstructController@map_constructor');
});