<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\news\NewsPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\news\CategoryController;
//use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
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
    Route::get('admin/dashboard', function () {
        return view('admin/dashboard');
    })->name('dashboard');
    Route::prefix('admin')
        ->group(function () {
            Route::get('/',[AdminController::class,'index'])->name('admin.index');

            Route::prefix('category')->group(function ()  {
                Route::get('/',[CategoryController::class,'index'])->name('categories.index');
                Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
                Route::post('/',[CategoryController::class,'destroy'])->name('categories.delete');
                Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
            });
            Route::prefix('newss')->group(function () {
                Route::get('ajax-crud-datatable', [NewsController::class, 'index']);
                Route::post('store', [NewsController::class, 'store']);
                Route::post('edit', [NewsController::class, 'edit']);
                Route::post('delete', [NewsController::class, 'destroy']);
                Route::get('categories',[NewsController::class,'categoryfetch']);


            });



            Route::prefix('news')->group(function () {
                Route::get('/fetchall',[NewsPostController::class,'fetchall'])->name('news.fetchall');
                Route::get('',[NewsPostController::class,'index'])->name('news.index');
                Route::get('/create',[NewsPostController::class,'create'])->name('news.create');
                Route::get('{news_post}',[NewsPostController::class,'show'])->name('news.show');
                Route::post('',[NewsPostController::class,'store'])->name('news.store');
                Route::get('{news_post}/edit',[NewsPostController::class,'edit'])->name('news.edit');
                Route::patch('{news_post}',[NewsPostController::class,'update'])->name('news.update');
                Route::delete('{news_post}',[NewsPostController::class,'destroy'])->name('news.delete');
            });

        });
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');

//    Route::controller(ProductController::class)->prefix('products')->group(function () {
//        Route::get('', 'index')->name('products');
//        Route::get('create', 'create')->name('products.create');
//        Route::post('store', 'store')->name('products.store');
//        Route::get('show/{id}', 'show')->name('products.show');
//        Route::get('edit/{id}', 'edit')->name('products.edit');
//        Route::put('edit/{id}', 'update')->name('products.update');
//        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
//    });

});


Route::get('/home', function () {
    return view('/welcome');
})->name('welcome');
// Route::get('/calc',function () {
//     return view('main/calc');
// })->name('calc');
// Route::prefix('catalog')
//     ->group(function () {
//         Route::get('/',function () {
//             return view('welcome');
//         });
//         Route::get('/external_work',function () {
//             return view('catalog/external_work');
//         });
//         Route::get('/internal_work',function () {
//             return view('catalog/internal_work');
//         });
// });







// Route::prefix('info')->group(function () {
//     Route::get('',[StaticPageController::class,'index'])->name('info.index');

//     Route::get('/create',[StaticPageController::class,'create'])->name('info.create');
//     Route::post('',[StaticPageController::class,'store'])->name('info.store');

//     Route::get('{staticPage}',[StaticPageController::class,'show'])->name('info.show');

//     Route::get('{staticPage}/edit', [StaticPageController::class ,'edit'])->name('info.edit');

//     Route::put('{staticPage}', [StaticPageController::class,'update'])->name('info.update');

//     Route::delete('{staticPage}', [StaticPageController::class,'destroy'])->name('info.destroy');


// });




