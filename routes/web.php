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
    return view('welcome');
});

Route::get('/blog', 'PostController@index')->name('index');
Route::get('/blog/{slug}', 'PostController@show')->name('post.show');

/*
|--------------------------------------------------------------------------
| Blog Editor Routes
|--------------------------------------------------------------------------
|
| Here is where all the routes for creating, updating and storing
| blog posts.
|
*/

Route::get('/blog/post/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::post('/blog/post/create', 'PostController@store')->name('post.store')->middleware('auth');
Route::get('blog/post/{id}/edit', 'PostController@edit')->name('post.edit')->middleware('auth');
Route::post('blog/post/{id}/edit', 'PostController@update')->name('post.update')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your Dashboard. Currently
| we only have a basic set up here.
|
*/

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
