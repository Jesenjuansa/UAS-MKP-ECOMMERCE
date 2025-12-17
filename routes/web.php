<?php

use App\Models\Lesson;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\scheduleController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TutorClassController;
use App\Http\Controllers\Admin\paymentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\requestTutorsController;
use App\Http\Controllers\Student\RatingController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\TutorPayoutController;
use App\Http\Controllers\Admin\verificationController;
use App\Http\Controllers\Admin\LessonRequestController;
use App\Http\Controllers\Student\homeStudentController;
use App\Http\Controllers\Student\aboutStudentController;
use App\Http\Controllers\Student\profileStudentController;
use App\Http\Controllers\Student\mylessonStudentController;
use App\Http\Controllers\Student\scheduleStudentController;

/* ADMINNNNN */
Route::prefix('admin')->middleware('block.url')->name('admin.')->group(function () {
    Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('/user', [userController::class, 'index'])->name('user');
    Route::get('/verification', [verificationController::class, 'index'])->name('verification');
    Route::get('/request', [LessonRequestController::class, 'index'])->name('request');
    Route::get('/payment', [paymentController::class, 'index'])->name('payment');
 // STUDENT STATUS
    Route::post('/student/{id}/suspend', [userController::class, 'suspendStudent'])->name('student.suspend');
    Route::post('/student/{id}/activate', [userController::class, 'activateStudent'])->name('student.activate');

// TUTOR STATUS
    Route::post('/tutor/{id}/suspend', [userController::class, 'suspendTutor'])->name('tutor.suspend');
    Route::post('/tutor/{id}/activate', [userController::class, 'activateTutor'])->name('tutor.activate');

    // Halaman daftar tutor menunggu verifikasi
    Route::get('/verification', [VerificationController::class, 'index'])->name('verification');

    // Action
    Route::post('/verification/{id}/verify', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/verification/{id}/reject', [VerificationController::class, 'reject'])->name('verification.reject');

    Route::get('/request',[LessonRequestController::class, 'index'])->name('request');
    Route::delete('/lesson-requests/{id}',[LessonRequestController::class, 'destroy'])->name('lesson.requests.delete');


// Student Payments
    Route::get('/payments', [paymentController::class, 'index'])->name('payments');
    Route::post('/payments/{id}/approve', [paymentController::class, 'approve'])->name('payments.approve');
    Route::post('/payments/{id}/reject', [paymentController::class, 'reject'])->name('payments.reject');

    // Tutor Payouts
    Route::get('/payouts', [TutorPayoutController::class, 'index'])->name('payouts');
    Route::post('/payouts/{id}/mark-paid', [TutorPayoutController::class, 'markPaid'])->name('payouts.markPaid');


});

/* TUTORRRRSS */
Route::prefix('tutors')->middleware('auth', 'block.url', 'blockSuspended')->name('tutors.')->group(function () {
    Route::get('/', [homeController::class, 'index'])->name('home');
    Route::get('/requests', [requestTutorsController::class, 'index'])->name('request');
    Route::get('/schedule', [scheduleController::class, 'index'])->name('schedule');
    Route::get('/profile', [profileController::class, 'index'])->name('profile');

    Route::get('/classes', [TutorClassController::class, 'index'])->name('classes');
    Route::get('/classes/create', [TutorClassController::class, 'create'])->name('classes.create');
    Route::post('/classes/store', [TutorClassController::class, 'store'])->name('classes.store');
    Route::get('/classes/{id}/edit', [TutorClassController::class, 'edit'])->name('classes.edit');
    Route::put('/classes/{id}', [TutorClassController::class, 'update'])->name('classes.update');
    Route::delete('/classes/{id}', [TutorClassController::class, 'destroy'])->name('classes.delete');

    Route::post('/accept', [RequestTutorsController::class, 'accept'])->name('request.accept');
    Route::post('/reject', [RequestTutorsController::class, 'reject'])->name('request.reject');
    Route::post('/mark-done', [RequestTutorsController::class, 'markDone'])->name('markdone');

    Route::post('/start-class', [ScheduleController::class, 'startClass'])->name('startclass');
    Route::post('/complete-class', [ScheduleController::class, 'completeClass'])->name('completeclass');


    Route::post('/profile/update', [profileController::class, 'update'])->name('profile.update');
});

/* STUDENTTTT */
Route::prefix('student')->middleware('auth', 'block.url', 'blockSuspended')->name('student.')->group(function () {
    Route::get('/', [homeStudentController::class, 'index'])->name('home');
    Route::get('/about', [aboutStudentController::class, 'index'])->name('about');
    Route::get('/schedule', [scheduleStudentController::class, 'index'])->name('schedule');
    Route::get('/mylesson', [mylessonStudentController::class, 'index'])->name('mylesson');
    Route::post('/my-lessons/payment',[mylessonStudentController::class, 'storePayment'])->name('payment.store');
    Route::post('/student/rating/store',[RatingController::class, 'store'])->name('rating.store');

    Route::get('/class/{id}', [homeStudentController::class, 'showClassDetail'])->name('class.detail');
    Route::post('/request', [homeStudentController::class, 'sendRequest'])->name('request.store');
    Route::get('/profile',[profileStudentController::class, 'index'])->name('profile');


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


/* Route::post('/rating', [RatingController::class, 'store'])->name('rating.store'); */


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


