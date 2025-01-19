<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('pengurus/register', 'pages.auth.register')
        ->name('register');

    Volt::route('pengurus/login', 'pages.auth.login')
        ->name('login');

    Volt::route('pengurus/forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('pengurus/reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('pengurus/verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('pengurus/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('pengurus/confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});
