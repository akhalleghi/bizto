<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// احراز هویت با SMS
Route::post('/send-verification-code', [VerificationController::class, 'sendVerificationCode'])->name('send.verification.code');
Route::post('/verify-code', [VerificationController::class, 'verifyCode'])->name('verify.code');

// ثبت نام
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [VerificationController::class, 'register'])->name('register.submit');

// داشبورد
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::post('/test-route', function() {
    return response()->json(['message' => 'Test successful']);
});

// برای صفحه ویرایش پروفایل
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');
});

// سایر مسیرها...

//Fallback route for 404 - must be last
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});