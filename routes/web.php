<?php

use App\Http\Controllers\Admin\ModelControllers\LeadsController;
use App\Http\Controllers\Admin\ModelControllers\NewsController;
use App\Http\Controllers\Admin\ModelControllers\ProductsController;
use App\Http\Controllers\Admin\ModelControllers\StaticPageController;
use App\Http\Controllers\Site\CalculatorController;
use App\Http\Controllers\Site\ContactsController;
use App\Http\Controllers\Site\MainController;
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

Route::prefix('frontend')->group(function () {
    Route::get('/', MainController::class)->name('user.main.index');
    Route::post('/', [LeadsController::class, 'store'])->name('user.leads.store');

    Route::get('/catalog', ProductsController::class)->name('user.catalog.index');

    Route::get('/catalog/{slug}', [ProductsController::class, 'show'])->name('user.catalog.show');

    Route::get('/news', NewsController::class)->name('user.news.index');

    Route::get('/news/{slug}', [NewsController::class, 'show'])->name('user.news.show');

    Route::get('/contacts', ContactsController::class)->name('user.contacts.index');

    Route::get('/calculator', CalculatorController::class)->name('user.calc.index');

    Route::get('/{slug}', [StaticPageController::class, 'show'])->name('user.static.page.show');

});

