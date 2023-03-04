<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomTypeController;

Route::redirect('/', 'rooms/types');

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::get('/register', [AdminController::class, 'register'])->name('register');

Route::prefix('rooms')->group(function() {
    Route::get('/types', [RoomTypeController::class, 'types'])->name('room.types');
});



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/role', [AdminController::class, 'role'])->name('role');
    Route::middleware('adminMiddleware')->prefix('dashboard')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::prefix('room')->group(function() {
            Route::get('/index', [AdminController::class, 'roomIndex'])->name('dashboard.roomIndex');
            Route::get('/create', [AdminController::class, 'roomCreate'])->name('dashboard.roomCreate');
        });
        Route::prefix('room-type')->group(function() {
            Route::get('/index', [AdminController::class, 'roomTypeIndex'])->name('dashboard.roomTypeIndex');
        });
    });
    Route::middleware('userMiddleware')->group(function () {
        Route::post('/booking/{user_id}', [BookingController::class, 'book'])->name('booking');
        Route::get('/details/{id}', [RoomTypeController::class, 'details'])->name('room.details');
    });
});
