<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
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

Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::resource('pages', PageController::class);
});
Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');
Route::get('/read/{slug}', [App\Http\Controllers\MainController::class, 'single'])->name('main.single');
Route::get('/category', [App\Http\Controllers\MainController::class, 'category'])->name('main.category');
Route::get('/category/{slug}', [App\Http\Controllers\MainController::class, 'categorypost'])->name('main.categorypost');
Route::get('/{slug}', [App\Http\Controllers\MainController::class, 'pages'])->name('main.pages');