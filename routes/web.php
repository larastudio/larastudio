<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware('auth:sanctum', 'verified')->group(function () {
    Route::resource('articles', ArticlesController::class);
});

// Route::middleware(['auth:sanctum', 'verified'])->get('articles/show', function () {
//     return Inertia::render('Articles/Show');
// })->name('articles');

// Route::middleware(['auth:sanctum', 'verified'])->get('articles/create', function () {
//     return Inertia::render('Articles/CreateArticle');
// })->name('create-articles');

// Route::resource('articles', ArticleController::class);

// Route::middleware('auth:sanctum')->group( function () {
//     Route::resource('products', ProductController::class);
// });
