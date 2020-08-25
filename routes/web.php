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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','HomeController@index')->name('home');

Route::prefix('admin')->middleware('CheckRole')->group(function () {
        Route::get('post','PostController@index')->name('post');
        Route::get('post/create','PostController@create')->name('post.create');
        Route::get('post/edit/{id}','PostController@edit')->name('post.edit');
        Route::get('post/delete','PostController@delete')->name('post.delete');
        Route::post('post/save/{id?}','PostController@save')->name('post.save');

        Route::get('user','UserController@index')->name('user');
        Route::get('user/create','UserController@create')->name('user.create');
        Route::get('user/edit','UserController@edit')->name('user.edit');
        Route::get('user/{id}','UserController@delete')->name('user.delete');
        Route::post('user/save/{id?}','UserController@save')->name('user.save');
});
Route::get('login','LoginController@getLogin')->name('login');
Route::post('login','LoginController@postLogin')->name('login');
Route::get('logout','LoginController@postlogout')->name('logout');



