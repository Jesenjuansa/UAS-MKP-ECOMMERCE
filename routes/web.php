<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\scheduleController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Admin\paymentController;
use App\Http\Controllers\Admin\requestController;
use App\Http\Controllers\requestTutorsController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\verificationController;

    
/* ADMINNNNN */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('/user', [userController::class, 'index'])->name('user');
    Route::get('/verification', [verificationController::class, 'index'])->name('verification');
    Route::get('/request', [requestController::class, 'index'])->name('request');
    Route::get('/payment', [paymentController::class, 'index'])->name('payment');
});

/* TUTORRRRSS */
Route::prefix('tutor')->name('users.')->group(function () {
    Route::get('/', [homeController::class, 'index'])->name('home');
    Route::get('/about', [aboutController::class, 'index'])->name('about');
    Route::get('/requests', [requestTutorsController::class, 'index'])->name('request');
    Route::get('/schedule', [scheduleController::class, 'index'])->name('schedule');
});