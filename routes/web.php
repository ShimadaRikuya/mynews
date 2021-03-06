<?php

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

Route::group(['prefix' => 'admin'], function () {
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::get('profile/edit', 'Admin\ProfileController@edit');

});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function() {
    Route::get('Profile/create', 'Admin\ProfileController@add');
    Route::post('Profile/create', 'Admin\ProfileController@create');
    Route::get('profile/', 'Admin\ProfileController@index');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile/delete', 'Admin\ProfileController@delete');
});

