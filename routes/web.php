<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AuthController, HomeController};

/************  */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/superadmin/login', [AuthController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('auth_redirect:web');

Route::prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {
        Route::middleware('auth_redirect:web')->group(function () {
            Route::post('login', [AuthController::class, 'login'])->name('login.submit');
        });
        Route::middleware('auth:web')->group(function () {
            Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
            Route::post('logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('patients', [HomeController::class, 'patients'])->name('patients');
            Route::prefix('doctors')
                ->name('doctors.')
                ->group(function () {
                    Route::get('doctors', [HomeController::class, 'doctors'])->name('list');
                    Route::get('details', [HomeController::class, 'doctorDetail'])->name('detail');
                });
        });
    });
