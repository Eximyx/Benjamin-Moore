<?php
use App\Http\Controllers\FakeController;
use App\Http\Controllers\FakeMainController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewController;
use Illuminate\Support\Facades\Route
;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogController;
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
            Route::prefix('leads')->group(function () {
                Route::get('/', [LeadsController::class, 'index'])->name('leads.index');
                Route::post('store', [LeadsController::class, 'store']);
                Route::post('edit', [LeadsController::class, 'edit']);
                Route::post('delete', [LeadsController::class, 'destroy']);
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
Route::prefix('')->group(function () {
    Route::get('/', [FakeMainController::class, 'index'])->name('main.index');
    Route::get('/catalog', [FakeMainController::class, 'catalog'])->name('user.catalog');
    Route::get('/catalog/{slug}', [FakeMainController::class, 'showProduct'])->name('product.show');
    Route::get('/news', [FakeMainController::class, 'news'])->name('user.news');
    Route::get('/news/{slug}', [FakeMainController::class, 'newsShow'])->name('user.news.show');
    Route::get('/calculator', [FakeMainController::class, 'calc'])->name('calc');
    Route::get('/contacts', [FakeMainController::class, 'contacts'])->name('contacts');
    Route::post('/leads', [FakeMainController::class, 'leads'])->name('leads');
});

// Route::get('/home', [MainController::class, 'index'])->name('main.index');
// Route::get('/calculator', function () {
//     return view('user.calculator');
// })->name('calc');
// Route::get('/contacts', function () {
//     return view('user.contacts');
// })->name('contacts');
// Route::get('/news', [NewsController::class, 'news_index'])->name('user.news');
// Route::get('/news/{slug}', [NewsController::class, 'show']);

// Route::post('categoryProduct/fetch', [ProductCategoryController::class, 'fetch'])->name('fetch');

// Route::get('catalog', [CatalogController::class, 'index'])->name('user.catalog');

// Route::post('/leads', [MainController::class, 'leads'])->name('leads');

// Route::get('/profile', [AuthController::class, 'profileUser'])->name('prof');

// Route::get('/product/{slug}', [CatalogController::class, 'show'])->name('product.show');


// Route::get('/test',[FakeController::class,'index'])->name('test');




Route::prefix('test')->group(function () {

});

Route::prefix('test1')->group(function () {
    Route::get('/', [NewController::class, 'index']);
    Route::post('store', [NewController::class, 'store']);
    Route::post('edit', [NewController::class, 'edit']);
    Route::post('delete', [NewController::class, 'delete']);
    Route::post('toggle', [NewController::class, 'toggle']);
});

Route::prefix('test2')->group(function () {
    Route::get('/', [ProductCategoryController::class, 'index']);
    Route::post('store', [ProductCategoryController::class, 'store']);
    Route::post('edit', [ProductCategoryController::class, 'edit']);
    Route::post('delete', [ProductCategoryController::class, 'delete']);
    Route::post('toggle', [ProductCategoryController::class, 'toggle']);
});

Route::prefix('test3')->group(function () {
    Route::get('/', [StaticPageController::class, 'index']);
    Route::post('store', [StaticPageController::class, 'store']);
    Route::post('edit', [StaticPageController::class, 'edit']);
    Route::post('delete', [StaticPageController::class, 'delete']);
    Route::post('toggle', [StaticPageController::class, 'toggle']);
});

Route::prefix('test4')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('store', [CategoryController::class, 'store']);
    Route::post('edit', [CategoryController::class, 'edit']);
    Route::post('delete', [CategoryController::class, 'delete']);
    Route::post('toggle', [CategoryController::class, 'toggle']);
});

Route::prefix('test5')->group(function () {
    Route::get('/', [LeadsController::class, 'index']);
    Route::post('store', [LeadsController::class, 'store']);
    Route::post('edit', [LeadsController::class, 'edit']);
    Route::post('delete', [LeadsController::class, 'delete']);
    Route::post('toggle', [LeadsController::class, 'toggle']);
});

Route::prefix('test6')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::post('store', [AdminController::class, 'store']);
    Route::post('edit', [AdminController::class, 'edit']);
    Route::post('delete', [AdminController::class, 'delete']);
});


