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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact','PagesController@getContact');
Route::get('/details','PagesController@getPostDetails');

Route::get('/posts/index', 'PostController@index')->name('index');
// Route::get('/posts/index', 'PostController@index');
Route::get('/posts/create', 'PostController@create')->name('create');
//Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::post('/PostComment','CommentsController@store');
Route::post('/PostReply','CommentsController@storeReply');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('posts', 'PostController');
