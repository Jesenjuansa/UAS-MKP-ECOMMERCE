<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\scheduleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Admin\paymentController;
use App\Http\Controllers\Admin\requestController;
use App\Http\Controllers\requestTutorsController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\verificationController;
use App\Http\Controllers\Student\homeStudentController;
use App\Http\Controllers\Student\aboutStudentController;
use App\Http\Controllers\Student\mylessonStudentController;
use App\Http\Controllers\Student\scheduleStudentController;


/* ADMINNNNN */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('/user', [userController::class, 'index'])->name('user');
    Route::get('/verification', [verificationController::class, 'index'])->name('verification');
    Route::get('/request', [requestController::class, 'index'])->name('request');
    Route::get('/payment', [paymentController::class, 'index'])->name('payment');
});

/* TUTORRRRSS */
Route::prefix('tutors')->name('tutors.')->group(function () {
    Route::get('/', [homeController::class, 'index'])->name('home');
    Route::get('/about', [aboutController::class, 'index'])->name('about');
    Route::get('/requests', [requestTutorsController::class, 'index'])->name('request');
    Route::get('/schedule', [scheduleController::class, 'index'])->name('schedule');
    Route::get('/profile', [profileController::class, 'index'])->name('profile');
});

/* STUDENTTTT */
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/', [homeStudentController::class, 'index'])->name('home');
    Route::get('/about', [aboutStudentController::class, 'index'])->name('about');
    Route::get('/schedule', [scheduleStudentController::class, 'index'])->name('schedule');
    Route::get('/mylesson', [mylessonStudentController::class, 'index'])->name('mylesson');
});

/*AUTHHHHH*/
// LOGIN
Route::prefix('auth')->name('auth.')->group(function () {
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// REGISTER (2 halaman, 1 proses)
Route::get('/register', [RegisterController::class, 'showStudentForm'])->name('register');
Route::get('/register/tutor', [RegisterController::class, 'showTutorForm'])->name('register.tutor');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');
});

/*GUESTTT*/
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Halaman Register
Route::get('/tutor', function () {
    return view('tutor');
})->name('tutor');

Route::get('/about', function () {
    return view('about');
})->name('about');


