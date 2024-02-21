<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\SettingsControllers\AdminMainController;
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
    Route::get('/', [AdminMainController::class, 'index'])->name('settings');
    Route::post('/contacts', [AdminMainController::class, 'contacts'])->name('settings.contacts');
    Route::prefix('/banners')->group(function () {
        Route::post('/delete', [AdminMainController::class, 'deleteBanner'])->name('settings.delete.banner');
        Route::post('/create', [AdminMainController::class, 'createBanner'])->name('settings.create.banner');
        Route::post('/edit', [AdminMainController::class, 'editBanner'])->name('settings.edit.banner');
        Route::post('/update', [AdminMainController::class, 'updateBanner'])->name('settings.update.banner');
        Route::post('/toggle', [AdminMainController::class, 'toggleBanners'])->name('settings.toggle.banners');
    });
    Route::prefix('/about-us')->group(function () {
        Route::post('/delete', [AdminMainController::class, 'deleteSection'])->name('settings.delete.section');
        Route::post('/create', [AdminMainController::class, 'createSection'])->name('settings.create.section');
        Route::post('/edit', [AdminMainController::class, 'editSection'])->name('settings.edit.section');
        Route::post('/update', [AdminMainController::class, 'updateSection'])->name('settings.update.section');
        Route::post('/toggle', [AdminMainController::class, 'toggleSections'])->name('settings.toggle.sections');
    });
}

);

Route::get('/eee', function () {
    return view('user.test');
});
require __DIR__ . '/admin.php';
