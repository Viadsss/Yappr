<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUser;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/yaps', [PostController::class, 'index'])
    ->middleware('auth')
    ->name('yaps.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [RegisteredUser::class, 'show'])->name('profile');
    Route::get('/profile/edit', [RegisteredUser::class, 'edit'])->name('edit-profile');
    Route::put('/profile', [RegisteredUser::class, 'update'])->name('update-profile');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUser::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUser::class, 'store'])->name('user.store');

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('session.store');
});

Route::delete('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

