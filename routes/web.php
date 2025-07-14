<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('yaps.index');
    }

    return view('index');
})->name('index');

Route::get('/test', function () {
    return view('test');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('user.store');

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('session.store');
});

Route::delete('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/yaps/create', [PostController::class, 'create'])->name('yaps.create');
    Route::post('/yaps', [PostController::class, 'store'])->name('yaps.store');

    Route::get('/profile/edit', [RegisteredUserController::class, 'edit'])->name('edit-profile');
    Route::put('/profile', [RegisteredUserController::class, 'update'])->name('update-profile');
    Route::put('/profile/password', [RegisteredUserController::class, 'updatePassword'])->name('update-profile-password');
    Route::get('/yaps/{post:slug}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/yaps/{post:slug}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/yaps/{post:slug}', [PostController::class, 'destroy'])->name('post.destroy');
});

Route::get('/yaps', [PostController::class, 'index'])->name('yaps.index');
Route::get('/u/{user:username}', [RegisteredUserController::class, 'show'])->name('profile');

Route::get('/yaps/{post:slug}', [PostController::class, 'show'])->name('post.show');

Route::post('/reactions', [ReactionController::class, 'store'])->name('reactions.store');
