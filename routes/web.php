<?php

use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return 'Hello world';
// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/', [postController::class, 'index'])->name('post.index');
Route::get('/posts/{post}', [postController::class, 'show'])->name('post.show');
Route::get('/posts/{post}/edit', [postController::class, 'edit'])->name('post.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::post('/post/store', [postController::class, 'store'])->name('post.store');
Route::post('/post/{post}', [postController::class, 'destroy'])->name('post.destroy');
