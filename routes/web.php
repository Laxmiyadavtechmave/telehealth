<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AuthController, HomeController, PharmacyController, RoleController, UserController, ClinicController};
use App\Http\Controllers\Clinic\DoctorController;
use App\Http\Controllers\Clinic\HomeController as ClinicHomeController;
use App\Http\Controllers\Clinic\NurseController;
use App\Http\Controllers\Clinic\PatientController;
use App\Http\Controllers\Clinic\RoleController as ClinicRoleController;
use App\Http\Controllers\Clinic\UserController as ClinicUserController;
use App\Http\Controllers\Clinic\PharmacyController as ClinicPharmacyController;
use App\Http\Controllers\Clinic\AuthController as ClinicAuthController;

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
            Route::resource('role', RoleController::class);
            Route::match(['get', 'put'], 'profile', [AuthController::class, 'profile'])->name('profile');
            Route::prefix('user')
                ->name('user.')
                ->group(function () {
                    Route::get('users', [UserController::class, 'index'])->name('index');
                    Route::post('store', [UserController::class, 'store'])->name('store');
                    Route::post('update-status', [UserController::class, 'updateStatus'])->name('update-status');
                    Route::post('update', [UserController::class, 'update'])->name('update');
                });

            /************************ clinic ************/
            Route::resource('clinic', ClinicController::class);
            Route::get('/clinics/datatable', [ClinicController::class, 'ajaxDataTable'])->name('clinics.ajaxDataTable');
            Route::post('clinics/documents-download/{clinicId}', [ClinicController::class, 'downloadDocuments'])->name('clinics.downloadDocuments');

            /*************************** pharmacy *****************/
            Route::resource('pharmacies', PharmacyController::class);
            Route::get('/pharmacy/datatable', [PharmacyController::class, 'ajaxDataTable'])->name('pharmacy.ajaxDataTable');
            Route::post('pharmacy/documents-download/{clinicId}', [PharmacyController::class, 'downloadDocuments'])->name('pharmacy.downloadDocuments');

            Route::get('patients', [HomeController::class, 'patients'])->name('patients');
            Route::prefix('doctors')
                ->name('doctors.')
                ->group(function () {
                    Route::get('/', [HomeController::class, 'doctors'])->name('list');
                    Route::get('details', [HomeController::class, 'doctorDetail'])->name('detail');
                });

            Route::prefix('nurses')
                ->name('nurses.')
                ->group(function () {
                    Route::get('/', [HomeController::class, 'nurses'])->name('list');
                    Route::get('details', [HomeController::class, 'nursesDetail'])->name('detail');
                });
        });
    });

/************************ clinic panel ************/

Route::get('/clinic/login', [ClinicAuthController::class, 'showLoginForm'])
    ->name('clinic.login');
    // ->middleware('auth_redirect:clinic');

// Route::middleware('auth_redirect:clinic')->group(function () {
    Route::post('clinic/login', [ClinicAuthController::class, 'login'])->name('clinic.login.submit');
// });


    Route::prefix('clinic')
        ->name('clinic.')
        ->group(function () {
            Route::get('dashboard', [ClinicHomeController::class, 'dashboard'])->name('dashboard');
            Route::resource('doctor', DoctorController::class);
            Route::resource('nurse', NurseController::class);
            Route::resource('patient', PatientController::class);
            Route::resource('pharmacy', ClinicPharmacyController::class);

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

