<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit']);
Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update']);

Route::get('/posts/create', [App\Http\Controllers\PostsController::class, 'create']);
