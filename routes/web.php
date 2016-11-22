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
Route::get('/',['as'=>'home','uses'=>'DashboardsController@index']);
Route::get('export/{type}','ArticlesController@exportExcel')->name('export');
Route::post('/save','UsersController@signup_store')->name('save');
Route::post('/import','ArticlesController@import')->name('import');
Route::resource('article','ArticlesController');
Route::resource('comment','CommentsController');

Route::get('login','SessionsController@login')->name('login');
Route::post('login','SessionsController@login_store')->name('login.store');
Route::get('logout','SessionsController@logout')->name('logout');