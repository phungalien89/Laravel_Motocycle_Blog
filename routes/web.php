<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    $posts = User::first()->posts;
    return view('welcome', compact('posts'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit']);
Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'index']);
Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update']);

Route::get('/posts/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::post('/posts', [App\Http\Controllers\PostsController::class, 'store']);
Route::get('/posts/{id}/edit', [App\Http\Controllers\PostsController::class, 'edit']);
Route::patch('/posts/{id}', [App\Http\Controllers\PostsController::class, 'update']);
Route::get('/posts/{id}', [App\Http\Controllers\PostsController::class, 'show']);
Route::delete('/posts/{id}', [App\Http\Controllers\PostsController::class, 'destroy']);


