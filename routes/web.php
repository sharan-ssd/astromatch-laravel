<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::match(['get', 'post'], '/', [HomeController::class, 'index']);
Route::match(['post'], '/submit-horoscope', [HomeController::class, 'submitHoroscope']);