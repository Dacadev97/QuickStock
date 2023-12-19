<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
use App\Models\Product;
use App\Http\Controllers\SalesController;
use App\Models\Sale;

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

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/productos', [ProductController::class, 'index'])->name('productos')->middleware('auth');

Route::get('/ventas', function () {
    $products = Product::all();
    $sales = Sale::all();
    return view('ventas', ['products' => $products], ['sales' => $sales]);
})->name('ventas')->middleware('auth');


Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');

Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('auth');

Route::post('productos', [ProductController::class, 'store'])->name('productos.store')->middleware('auth');

Route::get('/lista', [ProductController::class, 'showAll'])->name('lista')->middleware('auth');

Route::post('/products/{id}/sell', [ProductController::class, 'sell'])->name('sell')->middleware('auth');
