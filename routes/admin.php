<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModelControllers\AdminController;
use App\Http\Controllers\ModelControllers\BannersController;
use App\Http\Controllers\ModelControllers\CategoryController;
use App\Http\Controllers\ModelControllers\ColorController;
use App\Http\Controllers\ModelControllers\LeadsController;
use App\Http\Controllers\ModelControllers\MetaDataController;
use App\Http\Controllers\ModelControllers\NewsController;
use App\Http\Controllers\ModelControllers\PartnersController;
use App\Http\Controllers\ModelControllers\ProductCategoryController;
use App\Http\Controllers\ModelControllers\ProductsController;
use App\Http\Controllers\ModelControllers\ReviewController;
use App\Http\Controllers\ModelControllers\SectionsController;
use App\Http\Controllers\ModelControllers\StaticPageController;
use App\Http\Controllers\SettingsControllers\SettingsController;

Route::controller(AuthController::class)->middleware('user')->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('admin')->group(function () {
    Route::prefix('admin')
        ->group(function () {
            Route::prefix('settings')->group(function () {
                Route::get('/', [SettingsController::class, 'index'])->name('settings');
                Route::post('/contacts', [SettingsController::class, 'settings'])->name('settings.set');
            });

            Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
            Route::post('/profile', [AuthController::class, 'profile'])->name('profile');
            Route::post('update/{entity}', [NewsController::class, 'update']);

            Route::post('products/toggle', [ProductsController::class, 'toggle']);
            Route::post('news/toggle', [NewsController::class, 'toggle']);
            Route::post('static_pages/toggle', [StaticPageController::class, 'toggle']);
            Route::post('reviews/toggle', [ReviewController::class, 'toggle']);


            //TODO how to bring in "update" into resource, issue via request

            Route::post('products/update/{entity}', [ProductsController::class, 'update']);
            Route::post('partners/update/{entity}', [PartnersController::class, 'update']);
            Route::post('metadata/update/{entity}', [MetaDataController::class, 'update']);
            Route::post('news/update/{entity}', [NewsController::class, 'update']);
            Route::post('static_pages/update/{entity}', [StaticPageController::class, 'update']);
            Route::post('sections/update/{entity}', [SectionsController::class, 'update']);
            Route::post('news_categories/update/{entity}', [CategoryController::class, 'update']);
            Route::post('leads/update/{entity}', [LeadsController::class, 'update']);
            Route::post('product_categories/update/{entity}', [ProductCategoryController::class, 'update']);
            Route::post('users/update/{entity}', [AdminController::class, 'update']);
            Route::post('reviews/update/{entity}', [ReviewController::class, 'update']);
            Route::post('banners/update/{entity}', [BannersController::class, 'update']);
            Route::post('colors/update/{entity}', [ColorController::class, 'update']);

            Route::resources([
                'products' => ProductsController::class,
                'partners' => PartnersController::class,
                'news' => NewsController::class,
                'static_pages' => StaticPageController::class,
                'metadata' => MetaDataController::class,
                'news_categories' => CategoryController::class,
                'leads' => LeadsController::class,
                'product_categories' => ProductCategoryController::class,
                'users' => AdminController::class,
                'reviews' => ReviewController::class,
                'banners' => BannersController::class,
                'sections' => SectionsController::class,
                'colors' => ColorController::class,
            ]);
        });
});
