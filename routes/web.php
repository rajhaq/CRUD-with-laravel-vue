<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'ItemController@home');
Route::get('/homex', 'HomeController@index')->name('home');
Route::get('/home', 'ItemController@home');
Route::resource('/item', 'ItemController');
Route::any('{slug}', [
    'uses' => 'StatusController@index',
 ])->where('slug', '([A-z\d-\/_.]+)?');
