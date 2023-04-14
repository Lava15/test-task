<?php

use App\Http\Controllers\Api\V1\Authentication\AuthenticatedSessionController;
use App\Http\Controllers\Api\V1\Authentication\EmailVerificationNotificationController;
use App\Http\Controllers\Api\V1\Authentication\NewPasswordController;
use App\Http\Controllers\Api\V1\Authentication\PasswordResetLinkController;
use App\Http\Controllers\Api\V1\Authentication\RegisteredUserController;
use App\Http\Controllers\Api\V1\Authentication\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')->group(function () {
    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest')
        ->name('register');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')
        ->name('login');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest')
        ->name('password.email');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest')
        ->name('password.store');

    Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['auth', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth', 'throttle:6,1'])
        ->name('verification.send');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');
});
