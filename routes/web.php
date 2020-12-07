<?php

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
    return view('houses.index');
});

Auth::routes();

Route::prefix('admin')
    ->name('admin.')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('messages', 'MessageController@index')->name('messages');
        Route::resource('houses', 'HouseController');
    });

Route::get('houses.index', 'HouseController@index')->name('houses');
Route::get('houses/{slug}', 'HouseController@show')->name('houses.show');
Route::post('houses/search', 'HouseController@search')->name('houses.search');

