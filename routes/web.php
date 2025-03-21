<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUser;
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

Route::get('/yaps', [PostController::class, 'index'])
    ->middleware('auth')
    ->name('yaps.index');

Route::get('/yaps/create', [PostController::class, 'create'])
    ->middleware('auth')
    ->name('yaps.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [RegisteredUser::class, 'show'])->name('profile');
    Route::get('/profile/edit', [RegisteredUser::class, 'edit'])->name('edit-profile');
    Route::put('/profile', [RegisteredUser::class, 'update'])->name('update-profile');
    Route::put('/profile/password', [RegisteredUser::class, 'updatePassword'])->name('update-profile-password');
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

