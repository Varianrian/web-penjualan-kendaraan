<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\SaleHistoryController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/buy', [HomeController::class, 'buy'])->name('buy');
    Route::get('/payment/{id}', [HomeController::class, 'payment'])->name('payment');
    Route::get('/payment/cancel/{id}', [HomeController::class, 'cancelPayment'])->name('payment.cancel');
    Route::get('/history', [HomeController::class, 'history'])->name('history');

    Route::prefix('admin')->middleware('can:isAdmin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('models', ModelController::class);
        Route::resource('cars', CarController::class);
        Route::resource('sales', SaleHistoryController::class);
        Route::put('/sales/{id}/cancel', [SaleHistoryController::class, 'cancel'])->name('sales.cancel');
    });
});
