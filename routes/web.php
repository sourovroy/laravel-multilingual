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


Route::group(['prefix' => LaravelLocalization::setLocale()], function(){

	Route::get('/', 'PostController@index');
	
	Route::get('/create', 'PostController@create');
	Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
	Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');

});

Route::post('/store', 'PostController@store');
Route::patch('/posts/{post}', 'PostController@update')->name('posts.update');