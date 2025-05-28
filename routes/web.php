<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AuthController, HomeController , PharmacyController, RoleController,UserController,ClinicController};
use App\Http\Controllers\Clinic\DoctorController;
use App\Http\Controllers\Clinic\HomeController as ClinicHomeController;
use App\Http\Controllers\Clinic\NurseController;
use App\Http\Controllers\Clinic\PatientController;
use App\Http\Controllers\Clinic\RoleController as ClinicRoleController;
use App\Http\Controllers\Clinic\UserController as ClinicUserController;
use App\Http\Controllers\Clinic\PharmacyController as ClinicPharmacyController;

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
            Route::match(['get', 'put'], 'profile', [AuthController::class, 'profile'])->name('profile');
            Route::get('patients', [HomeController::class, 'patients'])->name('patients');
            Route::prefix('doctors')
                ->name('doctors.')
                ->group(function () {
                    Route::get('/', [HomeController::class, 'doctors'])->name('list');
                    Route::get('details', [HomeController::class, 'doctorDetail'])->name('detail');
                });

            /************************ clinic ************/
            Route::resource('clinic', ClinicController::class);
            Route::get('/datatable', [ClinicController::class, 'ajaxDataTable'])->name('clinics.ajaxDataTable');


            Route::prefix('nurses')
                ->name('nurses.')
                ->group(function () {
                    Route::get('/', [HomeController::class, 'nurses'])->name('list');
                    Route::get('details', [HomeController::class, 'nursesDetail'])->name('detail');
                });

            Route::resource('role', RoleController::class);

            Route::prefix('user')
                ->name('user.')
                ->group(function () {
                    Route::get('users', [UserController::class, 'index'])->name('index');
                    Route::post('store', [UserController::class, 'store'])->name('store');
                    Route::post('update-status', [UserController::class, 'updateStatus'])->name('update-status');
                    Route::post('update', [UserController::class, 'update'])->name('update');
                });

            Route::resource('pharmacists', PharmacyController::class);
        });
    });


 /************************ clinic panel ************/
Route::middleware('auth_redirect:clinic')->group(function () {

    Route::prefix('clinic')
        ->name('clinic.')
            ->group(function () {
                        Route::get('dashboard', [ClinicHomeController::class, 'dashboard'])->name('dashboard');
                        Route::resource('doctor',DoctorController::class);
                        Route::resource('nurse',NurseController::class);
                        Route::resource('patient',PatientController::class);
                        Route::resource('pharmacy',ClinicPharmacyController::class);

                        Route::prefix('user')
                                ->name('user.')
                                    ->group(function () {
                                        Route::get('users', [ClinicUserController::class, 'index'])->name('index');
                                        Route::post('store', [ClinicUserController::class, 'store'])->name('store');
                                        Route::post('update-status', [ClinicUserController::class, 'updateStatus'])->name('update-status');
                                        Route::post('update', [ClinicUserController::class, 'update'])->name('update');
                                    });

                        Route::resource('role', ClinicRoleController::class);
                });



});
