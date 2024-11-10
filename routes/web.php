<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::view('/', 'welcome');

Route::resource('posts', PostController::class);
