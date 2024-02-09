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

Route::get('routes', function () {
    $routeCollection = Route::getRoutes();

    foreach ($routeCollection as $value) {
        if (str_contains($value->uri, 'admin') && str_contains($value->getName(), 'index')) {
            echo
                '<li class="nav-item">' .
                '<a class="nav-link" href="' . $value->uri . '">' .
                '<i class="fas fa-fw fa-tachometer-alt"></i>' .
                '<span>Заказы</span></a>' .
                '</li>';

        }

    }
    echo "</table>";
});
Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/catalog', [MainController::class, 'catalog'])->name('user.catalog');
Route::get('/catalog/{slug}', [MainController::class, 'productShow'])->name('product.show');
Route::get('/news', [MainController::class, 'news'])->name('user.news');
Route::get('/news/{slug}', [MainController::class, 'newsShow'])->name('user.news.show');
Route::get('/calculator', [MainController::class, 'calc'])->name('calc');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::post('/leads', [MainController::class, 'leads'])->name('leads');

require __DIR__ . '/admin.php';
