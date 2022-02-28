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

Route::get('/', function () {
    return view('top');
});
Route::group(['middleware'=>'auth'],function(){
Route::get('/posts','PostController@home');
Route::get('/posts/create','PostController@create');
Route::post('/posts', 'PostController@store');
Route::get('/posts/{post}', 'PostController@reply');
Route::post('/posts/{post}', 'ReplyController@send');
Route::get('/players/{player}','PlayerController@player');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
