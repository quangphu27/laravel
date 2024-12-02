<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/login', [AuthController::class, 'login'])->name('login');  // Đổi tên route
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', function () {
    return view('login-register');
})->name('login.form');

Route::middleware('check_login')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('home');

    Route::get('/product-details', function () {
        return view('product-details');
    });

    Route::get('/cart', function () {
        return view('cart');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('categories', [CategoryController::class,'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('categories/edit/{
    category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class,'update'])->name('categories.update');
    Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
});