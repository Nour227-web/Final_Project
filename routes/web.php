<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('products', ProductController::class)->except(['index', 'show']);
});
Route::resource('products', ProductController::class)->only(['index', 'show']);





Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[HomeController::class,'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
});
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])
    ->name('orders.index');

Route::get('/orders/history', [App\Http\Controllers\OrderController::class, 'history'])
    ->name('orders.history');

Route::get('/orders/{order}', [App\Http\Controllers\OrderController::class, 'show'])
    ->name('orders.show');

Route::put('/orders/{order}/cancel', [App\Http\Controllers\OrderController::class, 'cancel'])
    ->name('orders.cancel');


    Route::get('/reviews/product/{product}', [App\Http\Controllers\ReviewController::class, 'index'])
    ->name('reviews.index');

Route::post('/reviews', [App\Http\Controllers\ReviewController::class, 'store'])
    ->name('reviews.store');

Route::get('/reviews/{review}/edit', [App\Http\Controllers\ReviewController::class, 'edit'])
    ->name('reviews.edit');

Route::put('/reviews/{review}', [App\Http\Controllers\ReviewController::class, 'update'])
    ->name('reviews.update');

Route::delete('/reviews/{review}', [App\Http\Controllers\ReviewController::class, 'destroy'])
    ->name('reviews.destroy');


    Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');