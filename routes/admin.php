<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
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
        Route::get('/text_editor', function(){
            return view('admin.texteditor', ['page' => 'media']);
        })->name('admin.text_editor');
        Route::prefix('size_management')->group(function () {
            Route::get('/', [AdminController::class, 'size_management'])->name('admin.size');
            // size filter
            Route::get('/get', [AdminController::class, 'get_size'])->name('admin.size.get');
            // add, update, remove size
            Route::post('/add', [AdminController::class, 'add_size'])->name('admin.size.add');
            Route::post('/update', [AdminController::class, 'update_size'])->name('admin.size.update');
            Route::post('/delete', [AdminController::class, 'delete_size'])->name('admin.size.delete');
        });

        Route::prefix('category_management')->group(function () {
            Route::get('/{type}', [CategoryController::class, 'index'])->name('admin.category');
            //get records by tabulator ajax
            // Route::get('/get/{type}', [CategoryController::class, 'get_category'])->name('admin.category.get');
            Route::post('/add', [CategoryController::class, 'add_category'])->name('admin.category.add');
            Route::post('/update', [CategoryController::class, 'update_category'])->name('admin.category.update');
            Route::post('/delete', [CategoryController::class, 'delete_category'])->name('admin.category.delete');
        });

    });

});
