<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
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

});
