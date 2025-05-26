<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AuthController, DashboardController};

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {
        Route::middleware('auth_redirect:web')->group(function () {
            Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
            Route::post('login', [AuthController::class, 'login'])->name('login.submit');
        });
        Route::middleware('auth:web')->group(function () {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        });
    });
