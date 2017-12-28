<?php

use \App\Http\Controllers\PostsController;
use \App\Http\Controllers\CommentsController;

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

Route::get('/posts', ['as' => 'all-posts', 'uses' => 'PostsController@index']);

Route::get('/posts/create', ['as' => 'create-post', 'uses' => 'PostsController@create']);

Route::post('/posts', ['as' => 'store-post', 'uses' => 'PostsController@store']);

Route::get('/posts/{id}', ['as' => 'single-post', 'uses' => 'PostsController@show']);

Route::post('/posts/{postId}/comments', ['as' => 'comments-post', 'uses' => 'CommentsController@store']);

Route::get('/register', 'RegisterController@create');

Route::post('/register', 'RegisterController@store');

Route::get('/logout', 'LoginController@destroy');

Route::get('/login', 'LoginController@create');

Route::post('/login', 'LoginController@store');

Route::get('/users/{id}', 'UsersController@show');

