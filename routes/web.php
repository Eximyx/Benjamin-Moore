<?php

use App\Http\Controllers\Admin\ModelControllers\LeadsController;
use App\Http\Controllers\Admin\ModelControllers\NewsController;
use App\Http\Controllers\Admin\ModelControllers\ProductsController;
use App\Http\Controllers\Admin\ModelControllers\StaticPageController;
use App\Http\Controllers\Site\MainController;
use App\Http\Controllers\TestController;
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
    Route::get('/contacts', [MainController::class, 'contacts'])->name('user.contacts');

    Route::get('/calc', [MainController::class, 'calc'])->name('user.calc');
    Route::post('/', [LeadsController::class, 'create'])->name('user.leads');
    Route::get('/{slug}', [StaticPageController::class, 'showBySlug'])->name('user.static-page-show');
});

Route::get('/filter', [ProductsController::class, 'filter']);
Route::get('/test', [TestController::class, 'test']);
Route::get('/testing', function () {
    $entity = NewsPost::create(['title' => 'последний', 'content' => 'asdas', 'description' => 'asdad']);
    $entity->update(['title' => 'asdkaskdas']);
    dd($entity);
});

Route::get('/erik', [TestController::class, 'erik']);

Route::get('/erikw', [TestController::class, 'index']);

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
