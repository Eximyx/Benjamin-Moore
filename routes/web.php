<?php

use App\Http\Controllers\AdminMainController;
use App\Http\Controllers\MainController;
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
Route::get('/admin/settings', [AdminMainController::class, 'index'])->name('settings');
Route::post('/admin/settings', [AdminMainController::class, 'contacts'])->name('settings.contacts');
Route::post('/admin/settings/delete', [AdminMainController::class, 'delete'])->name('settings.delete');
Route::post('/admin/settings/toggle', [AdminMainController::class, 'toggle'])->name('settings.toggle');
Route::get('/eee', function () {
    return view('user.test');
});
require __DIR__ . '/admin.php';
