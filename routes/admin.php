<?php

use App\Http\Controllers\Admin\ModelControllers\AdminController;
use App\Http\Controllers\Admin\ModelControllers\BannersController;
use App\Http\Controllers\Admin\ModelControllers\CategoryController;
use App\Http\Controllers\Admin\ModelControllers\ColorController;
use App\Http\Controllers\Admin\ModelControllers\LeadsController;
use App\Http\Controllers\Admin\ModelControllers\MetaDataController;
use App\Http\Controllers\Admin\ModelControllers\NewsController;
use App\Http\Controllers\Admin\ModelControllers\PartnersController;
use App\Http\Controllers\Admin\ModelControllers\ProductCategoryController;
use App\Http\Controllers\Admin\ModelControllers\ProductsController;
use App\Http\Controllers\Admin\ModelControllers\ReviewController;
use App\Http\Controllers\Admin\ModelControllers\SectionsController;
use App\Http\Controllers\Admin\ModelControllers\StaticPageController;
use App\Http\Controllers\Admin\SettingsControllers\AuthController;
use App\Http\Controllers\Admin\SettingsControllers\SettingsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->middleware('user')->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('admin')->group(function () {
    Route::prefix('admin')
        ->group(function () {

            Route::prefix('settings')->group(function () {
                Route::get('/', SettingsController::class)->name('settings.index');
                Route::post('/', SettingsController::class)->name('settings.update');
            });

            Route::prefix('profile')->group(function () {
                Route::get('/', ProfileController::class)->name('profile.index');
                Route::post('/', ProfileController::class)->name('profile.update');
            });

            Route::post('products/toggle', [ProductsController::class, 'toggle']);
            Route::post('news/toggle', [NewsController::class, 'toggle']);
            Route::post('static_pages/toggle', [StaticPageController::class, 'toggle']);
            Route::post('reviews/toggle', [ReviewController::class, 'toggle']);

            Route::resource('metadata', MetaDataController::class)->except(['create', 'store']);
            Route::resource('static-page', StaticPageController::class)->except(['create', 'store']);

            Route::middleware('root')->group(function () {
                Route::resource('users', AdminController::class);
            });

            Route::resources([
                'products' => ProductsController::class,
                'partners' => PartnersController::class,
                'news' => NewsController::class,
                'metadata' => MetaDataController::class,
                'news_categories' => CategoryController::class,
                'leads' => LeadsController::class,
                'product_categories' => ProductCategoryController::class,
                'reviews' => ReviewController::class,
                'banners' => BannersController::class,
                'sections' => SectionsController::class,
                'colors' => ColorController::class,
            ]);
        });
});
