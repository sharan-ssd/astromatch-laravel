<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\paymentController;

Route::post('/changeLanguage', [HomeController::class, 'index']);
Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::match(['get', 'post'], '/', [HomeController::class, 'index']);

//Route::match(['POST', 'GET'], '/submit-horoscope', [HomeController::class, 'submitHoroscope']);

Route::post('/submit-horoscope', [HomeController::class, 'submitHoroscope']);
Route::get('/process-horoscope', [HomeController::class, 'processHoroscope']);

Route::post('/payment/create-order', [PaymentController::class, 'createOrder']);

Route::get('/marriagereport', function () {
    return view('frontend.reports.match_maker_report');
});

Route::get('/plan_details', function () {
    return view('frontend.plans.plan_listing');
});

Route::get('/marriagereport-loader', function () {
    if (!session()->has('cachedHoroscope')) {
        return redirect('/');
    }
    return view('frontend.reports.report_loader');
});

Route::get('/dashboard', function () {
    return view('/frontend.dashboard.dashboard');
});

Route::get('/faq', function () {
    return view('/frontend.faq.faq');
});


Route::get('/profile', [HomeController::class, 'profile']);
Route::get('/edit-profile', [HomeController::class, 'editprofile']);
Route::get('/horoscopelist', [HomeController::class, 'horoscopelist']);
Route::get('/dashboard', function () {
    return view('/frontend.dashboard.dashboard');
});

Route::get('/faq', function () {
    return view('/frontend.faq.faq');
});
