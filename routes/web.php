<?php

use App\Http\Controllers\ErikController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ModelControllers\LeadsController;
use App\Http\Controllers\ModelControllers\NewsController;
use App\Http\Controllers\ModelControllers\ProductsController;
use App\Http\Controllers\ModelControllers\StaticPageController;
use App\Models\NewsPost;
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
    Route::get('/', [MainController::class, 'index'])->name('user.main.index');
    Route::get('/catalog', [ProductsController::class, 'catalog'])->name('user.catalog');
    Route::get('/news', [NewsController::class, 'news'])->name('user.news');
    Route::get('/news/{slug}', [NewsController::class, 'showBySlug'])->name('user.news-show');
    Route::get('/catalog/{slug}', [ProductsController::class, 'showBySlug'])->name('user.catalog-show');
    Route::get('/{slug}', [StaticPageController::class, 'showBySlug'])->name('user.static-page-show');
    Route::get('/contacts', [MainController::class, 'contacts'])->name('user.contacts');
    Route::get('/calc', [MainController::class, 'calc'])->name('user.calc');
    Route::post('/', [LeadsController::class, 'create'])->name('user.leads');
});

Route::get('/filter', [ProductsController::class, 'filter']);
Route::get('/test', [ErikController::class, 'test']);
Route::get('/testing', function () {
    $entity = NewsPost::create(['title' => 'последний', 'content' => 'asdas', 'description' => 'asdad']);
    $entity->createMetaData();
    dd($entity);
});

Route::get('/erik', [ErikController::class, 'erik']);

Route::get('/erikw', [ErikController::class, 'index']);

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
