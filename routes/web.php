<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('checkout');
});*/


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/get-by-category', [\App\Http\Controllers\HomeController::class, 'getProductsByCategory'])->name('get.products.by.category');
Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);
Route::get('/get-paginated', [\App\Http\Controllers\ShopController::class, 'getPaginated'])->name('get.paginated');
Route::get('/get-paginated-by-category', [\App\Http\Controllers\ShopController::class, 'getPaginatedByCategory']);
Route::get('/get-paginated-by-price', [\App\Http\Controllers\ShopController::class, 'getPaginatedByPrice']);
Route::get('/get-filtered-data', [\App\Http\Controllers\ShopController::class, 'getFilteredData']);
Route::get('/product-details', [\App\Http\Controllers\ProductDetailsController::class, 'index']);
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index']);
Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'index']);
Route::post('/checkout-place-order', [\App\Http\Controllers\CheckoutController::class, 'placeOrder']);
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact/submit', [\App\Http\Controllers\ContactController::class, 'contactSubmit']);
