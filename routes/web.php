<?php

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

Route::prefix('frontend')->group(function () {
    Route::get('/', function () {
        return view('frontend.main');
    })->name('user.main.index');
    Route::get('/catalog', function () {
        return view('frontend.catalog');
    })->name('user.catalog');
    Route::get('/news', function () {
        return view('frontend.news');
    })->name('user.news');
    Route::get('/contacts', function () {
        return view('frontend.contacts');
    })->name('user.contacts');
    Route::get('/calc', function () {
        return view('frontend.calculator');
    })->name('user.calc');

});


/*Route::get('/', [MainController::class, 'index'])->name('user.main.index');
Route::get('/catalog', [MainController::class, 'catalog'])->name('user.catalog');
Route::get('/catalog/{slug}', [MainController::class, 'productShow'])->name('user.product.show');
Route::get('/news', [MainController::class, 'news'])->name('user.news');
Route::get('/news/{slug}', [MainController::class, 'newsShow'])->name('user.news.show');
Route::get('/calculator', [MainController::class, 'calc'])->name('user.calc');*/
//Route::get('/contacts', [MainController::class, 'contacts'])->name('user.contacts');

Route::post('/leads', [MainController::class, 'leads'])->name('user.leads');

Route::get('/eee', function () {
    return view('user.test');
});
require __DIR__ . '/admin.php';
