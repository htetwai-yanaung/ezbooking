<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('user.home.index');
});

Route::prefix('admin')->group(function() {
    Route::get('/booking', [Controller::class, 'index'])->name('booking.index');
});

Route::prefix('user')->group(function() {
    Route::get('/login', [AdminController::class, 'login'])->name('user.login');
    Route::get('/register', [AdminController::class, 'register'])->name('user.register');
});

Route::prefix('booking')->group(function() {
    Route::get('/check-availability', function () {
        return view('user.home.details');
    });
});



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.booking.index');
    })->name('dashboard');
});
