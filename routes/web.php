<?php
/*
 * Quando nomear rotas com metodo GET não é necessário espeficicar na frente
 */

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\VehicleController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::get('', [AuthController::class, 'create'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login_post');
    Route::post('register', [AuthController::class, 'register'])->name('register_post');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'vehicles'], function () {
        Route::get('', [VehicleController::class, 'create'])->name('vehicle');
        Route::post('', [VehicleController::class, 'store'])->name('vehicle_post');
        Route::delete('{id}', [VehicleController::class, 'destroy'])->name('vehicle_delete');
        Route::put('{id}/edit', [VehicleController::class, 'update'])->name('vehicle_put');

        Route::get('{id}/edit', [VehicleController::class, 'edit'])->name('vehicleEdit');

        Route::group(['prefix' => 'maintenances'], function () {
            Route::get('{vehicleId}', [MaintenanceController::class, 'create'])->name('maintenances');
            Route::post('{vehicleId}', [MaintenanceController::class, 'store'])->name('maintenances_post');
            Route::delete('{vehicleId}/{maintenanceId}', [MaintenanceController::class, 'destroy'])->name('maintenances_delete');
            Route::get('{vehicleId}/{maintenanceId}', [MaintenanceController::class, 'edit'])->name('maintenancesEdit');
            Route::put('{vehicleId}/{maintenanceId}', [MaintenanceController::class, 'update'])->name('maintenances_put');
        });
    });

});

Route::get('', [HomeController::class, 'create'])->name('home')->middleware('auth');
