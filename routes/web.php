<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/shop', function () {
    return view('shop');
});


Route::get('/resetPassword', function () {
    return view('resetPassword');
});
Route::get('/send-password/{email}', [ResetPasswordController::class, 'sendNewPassword']);
Route::post('/resetPassword', [ResetPasswordController::class, 'submit'])->name('resetPassword.submit');

Route::middleware('check_login')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('/product-details', function () {
        return view('product-details');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    
});
Route::middleware(['check_admin'])->group(function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
