<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
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

Route::get('/home', function () {
    return view('/welcome');
})->name('welcome');

Route::get('/news',function () {
    return view('main/news');
})->name('news');

Route::get('/calc',function () {
    return view('main/calc');
})->name('calc');

Route::prefix('catalog')
    ->group(function () {
        Route::get('/',function () {
            return view('welcome');
        });
        Route::get('/external_work',function () {
            return view('catalog/external_work');
        });
        Route::get('/internal_work',function () {
            return view('catalog/internal_work');
        });
});
// flrnlfgmr
Route::get('/contacts', function () {
    return view('main/contacts');
})->name('contacts');
//Route::prefix('admin')
//    ->group(function () {
//        Route::get('/login',function () {
//            return view('welcome');
//        });
//        Route::get('/index',function () {
//            return view('catalog/external_work');
//        });
//        Route::get('/{}',function () {
//            return view('catalog/internal_work');
//        });
//    });

Route::prefix('info')->group(function () {
    Route::get('',[StaticPageController::class,'index'])->name('info.index');

    Route::get('/create',[StaticPageController::class,'create'])->name('info.create');
    Route::post('',[StaticPageController::class,'store'])->name('info.store');

    Route::get('{staticPage}',[StaticPageController::class,'show'])->name('info.show');

    Route::get('{staticPage}/edit', [StaticPageController::class ,'edit'])->name('info.edit');

    Route::put('{staticPage}', [StaticPageController::class,'update'])->name('info.update');

    Route::delete('{post}', [StaticPageController::class,'destroy'])->name('info.destroy');


});



Route::prefix('news')->group(function () {
    Route::get('',[NewsPostController::class,'index'])->name('news.index');
    Route::get('/create',[NewsPostController::class,'create'])->name('news.create');
    Route::get('{news_post}',[NewsPostController::class,'show'])->name('news.show');
    Route::post('',[NewsPostController::class,'store'])->name('news.store');
});


