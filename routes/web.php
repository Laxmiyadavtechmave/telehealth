<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\NurseController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\{AuthController, HomeController, PharmacyController, RoleController, UserController, ClinicController};

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


            Route::get('patients', [HomeController::class, 'patients'])->name('patients');
            Route::prefix('doctors')
                ->name('doctors.')
                ->group(function () {
                    Route::get('/', [HomeController::class, 'doctors'])->name('list');
                    Route::get('details', [HomeController::class, 'doctorDetail'])->name('detail');
                });

            /************************ clinic ************/
            Route::resource('clinic', ClinicController::class);
            Route::get('/clinics/datatable', [ClinicController::class, 'ajaxDataTable'])->name('clinics.ajaxDataTable');
            Route::get('clinics/documents-download/{clinicId}', [ClinicController::class, 'downloadDocuments'])->name('clinics.downloadDocuments');

            /*************************** pharmacy *****************/
            Route::resource('pharmacies', PharmacyController::class);
            Route::get('/pharmacy/datatable', [PharmacyController::class, 'ajaxDataTable'])->name('pharmacy.ajaxDataTable');
            Route::get('pharmacy/documents-download/{clinicId}', [PharmacyController::class, 'downloadDocuments'])->name('pharmacy.downloadDocuments');
        });
    });
