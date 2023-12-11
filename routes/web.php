<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\news\NewsPostController;
use App\Http\Controllers\StaticPageController;
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
            Route::prefix('news')->group(function () {
                Route::get('/ajax-crud-datatable', [NewsController::class, 'index'])->name('news.index');
                Route::post('store', [NewsController::class, 'store']);
                Route::post('edit', [NewsController::class, 'edit']);
                Route::post('delete', [NewsController::class, 'destroy']);
                Route::get('categories',[NewsController::class,'categoryfetch']);
            });

            Route::prefix('static-page')->group(function () {
                Route::get('/ajax-crud-datatable', [StaticPageController::class, 'index'])->name('static-page.index');
                Route::post('store', [StaticPageController::class, 'store']);
                Route::post('edit', [StaticPageController::class, 'edit']);
                Route::post('delete', [StaticPageController::class, 'destroy']);
                Route::post('toggle', [StaticPageController::class, 'toggle']);
                // Route::get('categories',[NewsController::class,'categoryfetch']);
            });
        
        });
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
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












