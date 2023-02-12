<?php

use App\Http\Controllers\ArticleShowController;
use App\Http\Controllers\Dashboard\ArticleController;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('articles', ArticleController::class)->except('show');
    // Route::get('/articles/{article}', ArticleShowController::class)->name('articles.show');

});

// Route::prefix('/admin')->middleware(['auth:sanctum', 'verified'])->get('articles/index', function () {
//     return Inertia::render('Article/Index');
// })->name('articles');

// Route::middleware(['auth:sanctum', 'verified'])->get('articles/create', function () {
//     return Inertia::render('Article/Create');
// })->name('create-articles');
Route::get('/articles/{article}', ArticleShowController::class)->name('articles.show');
