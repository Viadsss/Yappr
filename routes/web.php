<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUser;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/yaps', [PostController::class, 'index'])
    ->middleware('auth')
    ->name('yaps.index');


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUser::class, 'create'])->name('register.create');
    Route::post('/register', [RegisteredUser::class, 'store'])->name('register.store');

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('session.store');
});

Route::delete('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('session.destroy');
