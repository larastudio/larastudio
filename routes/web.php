<?php
use Illuminate\Routing\Route;

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

Route::get('stedding', function () {
     return view ('stedding');
});


Route::get('contact', 'ContactController@index'); // working
Route::post('contact', 'ContactController@mailToAdmin');

Route::get('blog', 'PostsController@index'); // working
Route::get('/posts/create', 'PostsController@create')->middleware('auth'); // working
Route::post('/posts', 'PostsController@store'); // working
Route::get('/posts/{post}', 'PostsController@show'); // working
Route::post('/posts/{post}/comments', 'CommentsController@store'); // working
Route::get('/posts/{id}/edit, PostsController@edit')>middleware('auth'); // working
Route::patch('/posts/{id}, PostsController@edit')>middleware('auth'); // working
// Posts resource
// GET /posts for viewing
// GET /posts/create for creation ( where the form is at now)
//  POST /posts storing the created post
//  GET /posts/{id}/edit to edit you go to slug or id /edit
//  PATCH /posts/{id} to update post based on edit
//  DELETE /posts{id}
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
