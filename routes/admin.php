<?php

use App\Http\Controllers\Admin\{
    AdminController,
    SizeController,
    CategoryController,
    PostController
};
use App\Http\Controllers\Admin\Auth\{
    LoginController,
    RegisterController
};

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
            Route::get('/', [SizeController::class, 'index'])->name('admin.size.index');
            // size filter
            Route::get('/get', [SizeController::class, 'get_size'])->name('admin.size.get');
            // add, update, remove size
            Route::post('/store', [SizeController::class, 'store'])->name('admin.size.store');
            Route::put('/update', [SizeController::class, 'update'])->name('admin.size.update');
            Route::delete('/destroy', [SizeController::class, 'destroy'])->name('admin.size.destroy');
        });

        Route::prefix('category_management')->group(function () {
            Route::get('/{type}', [CategoryController::class, 'index'])->name('admin.category.index');
            //get records by tabulator ajax
            // Route::get('/get/{type}', [CategoryController::class, 'get_category'])->name('admin.category.get');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::put('/update', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::delete('/destroy', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
        });

        Route::prefix('post_management')->group(function () {
            Route::get('/{type}', [PostController::class, 'index'])->name('admin.post.index');
            Route::get('/action/create', [PostController::class, 'create'])->name('admin.post.create');
            Route::post('/action/store', [PostController::class, 'store'])->name('admin.post.store');
            Route::get('/action/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
            Route::put('/action/update', [PostController::class, 'update'])->name('admin.post.update');
            Route::delete('/action/destroy', [PostController::class, 'destroy'])->name('admin.post.destroy');
        });

    });

});

