<?php
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route
;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\StaticPageController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductsController;


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
            Route::get('/', function () {
                return view('admin.dashboard');
            })->name('dashboard');
            Route::prefix('products')->group(function () {
                Route::get('/', [ProductsController::class, 'index'])->name('products.index');
                Route::post('store', [ProductsController::class, 'store']);
                Route::post('edit', [ProductsController::class, 'edit']);
                Route::post('delete', [ProductsController::class, 'destroy']);
                Route::get('categories', [ProductsController::class, 'categoryfetch']);
            });
            Route::prefix('news')->group(function () {
                Route::get('/', [NewsController::class, 'index'])->name('news.index');
                Route::post('store', [NewsController::class, 'store']);
                Route::post('edit', [NewsController::class, 'edit']);
                Route::post('delete', [NewsController::class, 'destroy']);
                Route::post('toggle', [NewsController::class, 'toggle']);
            });

            Route::prefix('static-page')->group(function () {
                Route::get('/', [StaticPageController::class, 'index'])->name('static-page.index');
                Route::post('store', [StaticPageController::class, 'store']);
                Route::post('edit', [StaticPageController::class, 'edit']);
                Route::post('delete', [StaticPageController::class, 'destroy']);
                Route::post('toggle', [StaticPageController::class, 'toggle']);
            });
            Route::prefix('news_category')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('news_category.index');
                Route::post('store', [CategoryController::class, 'store']);
                Route::post('edit', [CategoryController::class, 'edit']);
                Route::post('delete', [CategoryController::class, 'destroy']);
            });
            Route::prefix('product_category')->group(function () {
                Route::get('/', [ProductCategoryController::class, 'index'])->name('product_category.index');
                Route::post('store', [ProductCategoryController::class, 'store']);
                Route::post('edit', [ProductCategoryController::class, 'edit']);
                Route::post('delete', [ProductCategoryController::class, 'destroy']);
            });


            Route::prefix('users')->middleware('root')->group(function () {
                Route::get('/', [AdminController::class, 'index'])->name('user.index');
                Route::post('store', [AdminController::class, 'store']);
                Route::post('edit', [AdminController::class, 'edit']);
                Route::post('delete', [AdminController::class, 'destroy']);
                Route::post('toggle', [AdminController::class, 'toggle']);

            });
       
            Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
            Route::post('/profile_set', [AuthController::class, 'profile_set']);

        });
});


// Route::get('/home', [ProductsController::class,'shop'])->name('welcome');


Route::get('/home',[MainController::class,'index'])->name('main');











