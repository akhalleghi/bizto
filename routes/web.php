<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;

Route::get('/', function () {
    return view('welcome');
});

// For now, we'll create simple placeholder routes
Route::post('/login', function () {
    return redirect('/')->with('success', 'ورود موفقیت آمیز بود!');
})->name('login');

Route::post('/register', function () {
    return redirect('/')->with('success', 'ثبت نام موفقیت آمیز بود!');
})->name('register');

Route::get('/forgot-password', function () {
    return redirect('/')->with('info', 'لینک بازیابی رمز عبور ارسال شد.');
})->name('password.request');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
