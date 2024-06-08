<?php

use App\Http\Controllers\commentController;
use App\Http\Controllers\postController;
use App\Http\Controllers\PostLikeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return 'Hello world';
// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
route::group(['middleware' => ['auth']], function () {
    Route::get('/', [postController::class, 'index'])->name('post.index');
    Route::get('/posts/{post}', [postController::class, 'show'])->name('post.show');
    Route::get('/posts/{post}/edit', [postController::class, 'edit'])->name('post.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::post('/post/store', [postController::class, 'store'])->name('post.store');
    Route::post('/post/{post}', [postController::class, 'destroy'])->name('post.destroy');
    Route::post('post/like/{post}/{user}', [PostLikeController::class, 'toggleLike'])->name('post.likes');
    Route::post('post/comment/{post}/{user}', [commentController::class, 'addComment'])->name('post.comment');
});
