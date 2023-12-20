<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
use App\Models\Product;
use App\Http\Controllers\SalesController;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
    Route::get('register', 'showRegistrationForm')->name('register');
    Route::post('register', 'register');
    Route::post('logout', 'logout')->name('logout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/ventas', function () {
    $products = Product::all();
    $sales = Sale::all();
    return view('ventas', ['products' => $products], ['sales' => $sales]);
})->name('ventas')->middleware('auth');

Route::controller(ProductController::class)->group(function(){
    Route::get('/productos', 'index')->name('productos')->middleware('auth');
    Route::delete('products/{product}', 'destroy')->name('products.destroy')->middleware('auth');
    Route::put('products/{product}', 'update')->name('products.update')->middleware('auth');
    Route::post('productos', 'store')->name('productos.store')->middleware('auth');
    Route::get('/lista', 'showAll')->name('lista')->middleware('auth');
    Route::post('/products/{id}/sell', 'sell')->name('sell')->middleware('auth');
});