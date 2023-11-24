<?php

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

Route::get('/', function () {
    return view('/main/main');
});

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
        Route::get('/internal_work/',function () {
            return view('catalog/internal_work');
        });
});
