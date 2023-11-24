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
Route::get('/colors', function () {
    return view('main/colors');
})->name('colors');
Route::get('/contacts', function () {
    return view('main/contacts');
})->name('contacts');
