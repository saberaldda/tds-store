<?php

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\CurrencyConverterController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PaymentsController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\SubsMailsController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
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


require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
require __DIR__.'/front.php';

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('home/rate', [HomeController::class, 'rate'])->name('home.rate')->middleware('auth');

//Front Products Details
Route::get('products', [ProductController::class, 'index'])->name('products');
Route::get('product/{slug}', [ProductController::class, 'show'])->name('product.details');
Route::post('subsmail/store', [SubsMailsController::class, 'store'])->name('subsmail.store');

// Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist')->middleware('auth');
Route::post('/wishlist', [WishlistController::class, 'store'])->middleware('auth');
Route::post('/wishlist/delete', [WishlistController::class, 'delete'])->name('wishlist.delete')->middleware('auth');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'store']);
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('cart/quantity', [CartController::class, 'quantity'])->name('cart.quantity');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store']);

// Payment Method (PayPal)
Route::get('orders/{order}/payments/create', [PaymentsController::class, 'create'])->name('orders.payments.create');
Route::get('orders/{order}/payments/callback', [PaymentsController::class, 'callback'])->name('orders.payments.return');
Route::get('orders/{order}/payments/cancel', [PaymentsController::class, 'cancel'])->name('orders.payments.cancel');

// Currency Converter
Route::post('currency', [CurrencyConverterController::class, 'store'])->name('currency.store');

// Profile
Route::controller(ProfileController::class)->middleware('auth')
->group(function () {
    Route::get('profile/{user}', 'show')->name('profile.show');
    Route::post('profile/update/{user}', 'update')->name('profile.update');
    Route::post('profile/changepass/{user}', 'changePass')->name('profile.change-pass');
});

Route::get('test', [TestController::class, 'index']);

// Regular Expreion
// src="([^"]+)"
// src="{{ asset('assets/front/$1') }}"
