<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
// REI D. R.
// Show all posts on the home page
Route::get('/', [PostController::class, 'index'])->name('home');

// Standard CRUD routes for posts
Route::resource('posts', PostController::class);