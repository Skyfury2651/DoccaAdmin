<?php

use App\Http\Controllers\Web\Auth as AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController\RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [AuthController\RegisteredUserController::class, 'store']);

    Route::get('login', [AuthController\AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthController\AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [AuthController\PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [AuthController\PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [AuthController\NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [AuthController\NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [AuthController\EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [AuthController\VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [AuthController\EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [AuthController\ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [AuthController\ConfirmablePasswordController::class, 'store']);

    Route::put('password', [AuthController\PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthController\AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
