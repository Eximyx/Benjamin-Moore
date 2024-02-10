<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StaticPageController;

Route::controller(AuthController::class)->middleware('user')->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('admin')->group(function () {
    Route::prefix('admin')
        ->group(function () {
            Route::get('/', static function () {
                return view('admin.dashboard');
            })->name('dashboard');
            Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
            Route::post('/profileSet', [AuthController::class, 'profileSet'])->name('profileSet');

            Route::prefix('products')->group(function () {
                Route::get('/', [ProductsController::class, 'index'])->name('products.index');
                Route::post('store', [ProductsController::class, 'store']);
                Route::post('create', [ProductsController::class, 'create']);
                Route::post('update/{entity}', [ProductsController::class, 'update']);
                Route::post('edit', [ProductsController::class, 'edit']);
                Route::post('delete', [ProductsController::class, 'delete']);
                Route::post('toggle', [ProductsController::class, 'toggle']);

            });
            Route::prefix('news')->group(function () {
                Route::get('/', [NewsController::class, 'index'])->name('news.index');
                Route::post('store', [NewsController::class, 'store']);
                Route::post('create', [NewsController::class, 'create']);
                Route::post('update/{entity}', [NewsController::class, 'update']);
                Route::post('edit', [NewsController::class, 'edit']);
                Route::post('delete', [NewsController::class, 'delete']);
                Route::post('toggle', [NewsController::class, 'toggle']);
            });

            Route::prefix('static_pages')->group(function () {
                Route::get('/', [StaticPageController::class, 'index'])->name('static_pages.index');
                Route::post('create', [StaticPageController::class, 'create']);
                Route::post('update/{entity}', [StaticPageController::class, 'update']);
                Route::post('edit', [StaticPageController::class, 'edit']);
                Route::post('delete', [StaticPageController::class, 'delete']);
                Route::post('toggle', [StaticPageController::class, 'toggle']);
            });
            Route::prefix('news_categories')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('news_categories.index');
                Route::post('create', [CategoryController::class, 'create']);
                Route::post('update/{entity}', [CategoryController::class, 'update']);
                Route::post('edit', [CategoryController::class, 'edit']);
                Route::post('delete', [CategoryController::class, 'delete']);
            });
            Route::prefix('leads')->group(function () {
                Route::get('/', [LeadsController::class, 'index'])->name('leads.index');
                Route::post('create', [LeadsController::class, 'create']);
                Route::post('update/{entity}', [LeadsController::class, 'update']);
                Route::post('edit', [LeadsController::class, 'edit']);
                Route::post('delete', [LeadsController::class, 'delete']);
            });
            Route::prefix('product_categories')->group(function () {
                Route::get('/', [ProductCategoryController::class, 'index'])->name('product_categories.index');
                Route::post('create', [ProductCategoryController::class, 'create']);
                Route::post('update/{entity}', [ProductCategoryController::class, 'update']);
                Route::post('edit', [ProductCategoryController::class, 'edit']);
                Route::post('delete', [ProductCategoryController::class, 'delete']);
            });
            Route::prefix('users')->middleware('root')->group(function () {
                Route::get('/', [AdminController::class, 'index'])->name('user.index');
                Route::post('create', [AdminController::class, 'create']);
                Route::post('update/{entity}', [AdminController::class, 'update']);
                Route::post('edit', [AdminController::class, 'edit']);
                Route::post('delete', [AdminController::class, 'delete']);
                Route::post('toggle', [AdminController::class, 'toggle']);
            });


        });
});
