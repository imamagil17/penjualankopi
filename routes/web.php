<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/', [CoffeeController::class, 'index'])->name('home');
Route::post('/cart/add/{id}', [CoffeeController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CoffeeController::class, 'cart'])->name('cart');
Route::post('/cart/remove/{id}', [CoffeeController::class, 'removeFromCart'])->name('cart.remove');

use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

use App\Http\Controllers\CheckoutController;

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/payment-success', [CheckoutController::class, 'success'])->name('payment.success');

use App\Http\Controllers\PaymentController;

Route::get('/payment-success', [PaymentController::class, 'success'])->name('payment.success');

Route::get('/payment-success', function () {
    return view('payment-success');
})->name('payment.success');
