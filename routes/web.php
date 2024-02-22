<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\SettingsControllers\BannersController;
use App\Http\Controllers\SettingsControllers\SectionsController;
use App\Http\Controllers\SettingsControllers\SettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/catalog', [MainController::class, 'catalog'])->name('user.catalog');
Route::get('/catalog/{slug}', [MainController::class, 'productShow'])->name('product.show');
Route::get('/news', [MainController::class, 'news'])->name('user.news');
Route::get('/news/{slug}', [MainController::class, 'newsShow'])->name('user.news.show');
Route::get('/calculator', [MainController::class, 'calc'])->name('calc');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::post('/leads', [MainController::class, 'leads'])->name('leads');
Route::prefix('admin/settings')->group(function () {
    Route::get('/contacts', [SettingsController::class, 'index'])->name('settings');
    Route::post('/contacts', [SettingsController::class, 'contacts'])->name('settings.contacts');
    Route::prefix('/banners')->group(function () {
        Route::controller(BannersController::class)->group(function () {
            Route::delete('/delete', 'delete')->name('settings.delete.banner');
            Route::post('/create', 'create')->name('settings.create.banner');
            Route::get('/edit', 'edit')->name('settings.edit.banner');
            Route::patch('/update', 'update')->name('settings.update.banner');
            Route::patch('/toggle', 'toggle')->name('settings.toggle.banners');
        });
    });
    Route::prefix('/about-us')->group(function () {
        Route::controller(SectionsController::class)->group(function () {
            Route::post('/delete', 'delete')->name('settings.delete.section');
            Route::post('/create', 'create')->name('settings.create.section');
            Route::post('/edit', 'edit')->name('settings.edit.section');
            Route::post('/update', 'update')->name('settings.update.section');
            Route::post('/toggle', 'toggle')->name('settings.toggle.sections');
        });
    });
});

Route::get('/eee', function () {
    return view('user.test');
});
require __DIR__ . '/admin.php';
