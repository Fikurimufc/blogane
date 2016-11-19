<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/signup','UsersController@signup')->name('signup');
route::post('/save','UsersController@signup_store')->name('save');
Route::get('/',['as'=>'home','uses'=>'DashboardsController@index']);
Route::resource('article','ArticlesController');
Route::resource('comment','CommentsController');