<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Public landing page (WELCOME PAGE IS THE FIRST PAGE TO BE SHOWN)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Redirect authenticated users to their posts
Route::get('/dashboard', function () {
    return redirect()->route('posts.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // User profile & post listing
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/posts', [PostController::class, 'userPosts'])->name('profile.posts');

    // Post CRUD
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/public-posts', [PostController::class, 'publicIndex'])->name('posts.public');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Main dashboard hub
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // User Management Page
    Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');
    Route::patch('/users/{user}/make-admin', [AdminController::class, 'makeAdmin'])->name('users.makeAdmin');
    Route::patch('/users/{user}/make-user', [AdminController::class, 'makeUser'])->name('users.makeUser');

    // Post Management Page
    Route::get('/posts', [AdminController::class, 'postsIndex'])->name('posts.index');
    Route::delete('/posts/{post}', [AdminController::class, 'destroyPost'])->name('posts.destroy');
});

// THIS IS THE NEW LOGOUT ROUTE
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout.get');

require __DIR__.'/auth.php';    