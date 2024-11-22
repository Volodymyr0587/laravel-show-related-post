<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::view('/', 'welcome');

Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::delete('/post/{post}/image/{image}', [PostController::class, 'destroyPostImage'])->name('post.image.destroy');
Route::delete('/category/{category}/image/{image}', [CategoryController::class, 'destroyCategoryImage'])->name('category.image.destroy');
