<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::view('/', 'welcome');

Route::resource('posts', PostController::class);
Route::delete('/post/{post}/image/{image}', [PostController::class, 'destroyPostImage'])->name('post.image.destroy');
