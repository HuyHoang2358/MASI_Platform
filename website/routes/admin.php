<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\VoucherController;
use Illuminate\Support\Facades\Route;

Route::namespace('admin')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('admin.register');
    Route::post('/register', [RegisterController::class, 'store'])->name('admin.register.store');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    });
    Route::prefix('/voucher')->group(function(){
        Route::get('/', [VoucherController::class, 'index'])->name('voucher.index');
        Route::get('/add', [VoucherController::class, 'add'])->name('voucher.add');
        Route::post('/store', [VoucherController::class, 'store'])->name('voucher.store');
        Route::get('/edit/{id}', [VoucherController::class, 'edit'])->name('voucher.edit');
        Route::post('/edit/{id}', [VoucherController::class, 'update'])->name('voucher.update');
        Route::get('/delete/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');
    });


});


