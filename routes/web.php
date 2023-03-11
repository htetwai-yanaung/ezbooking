<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\FreeServiceController;

Route::redirect('/', 'rooms/index');

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::get('/register', [AdminController::class, 'register'])->name('register');

Route::prefix('rooms')->group(function() {
    Route::get('/index', [RoomController::class, 'index'])->name('room.index');
    Route::get('/details/{id}', [RoomController::class, 'details'])->name('room.details');
    Route::post('/booking', [BookingController::class, 'booking'])->name('booking');
});



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/role', [AdminController::class, 'role'])->name('role');
    Route::middleware('adminMiddleware')->prefix('dashboard')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::prefix('booking')->group(function() {
            Route::get('/list', [BookingController::class, 'listView'])->name('booking.list');
        });
        Route::prefix('room')->group(function() {
            Route::get('/index', [AdminController::class, 'roomIndex'])->name('dashboard.roomIndex');
            Route::get('/create', [AdminController::class, 'roomCreate'])->name('dashboard.roomCreate');
            Route::post('/store', [AdminController::class, 'roomStore'])->name('dashboard.roomStore');
            Route::get('/edit/{id}', [AdminController::class, 'roomEdit'])->name('dashboard.roomEdit');
            Route::post('/update/{id}', [AdminController::class, 'roomUpdate'])->name('dashboard.roomUpdate');
        });
        Route::prefix('room-types')->group(function() {
            Route::get('/index', [RoomTypeController::class, 'index'])->name('dashboard.roomTypeIndex');
            Route::post('/store', [RoomTypeController::class, 'store'])->name('dashboard.roomTypeStore');
            Route::get('/edit/{id}', [RoomTypeController::class, 'edit'])->name('dashboard.roomTypeEdit');
            Route::post('/update/{id}', [RoomTypeController::class, 'update'])->name('dashboard.roomTypeUpdate');
            Route::get('/delete/{id}', [RoomTypeController::class, 'delete'])->name('dashboard.roomTypeDelete');
        });
        Route::prefix('services')->group(function() {
            Route::get('/index', [FreeServiceController::class, 'index'])->name('services.index');
            Route::post('/store', [FreeServiceController::class, 'store'])->name('services.store');
            Route::get('/edit/{id}', [FreeServiceController::class, 'edit'])->name('services.edit');
            Route::get('/delete/{id}', [FreeServiceController::class, 'delete'])->name('services.delete');
            Route::post('/update/{id}', [FreeServiceController::class, 'update'])->name('services.update');
        });
    });
});
