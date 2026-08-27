<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;


/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Auth::routes();


/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/

// Admin: Create, Store, Edit, Update, Delete
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('products', ProductController::class)
        ->except(['index', 'show']);

});

// Everyone authenticated: View products
Route::middleware(['auth'])->group(function () {

    Route::resource('products', ProductController::class)
        ->only(['index', 'show']);

});


/*
|--------------------------------------------------------------------------
| Product Search / Filter / Sort
|--------------------------------------------------------------------------
*/

Route::get('/search', [ProductController::class, 'search'])
    ->name('products.search');

Route::get('/products/filter', [ProductController::class, 'filter'])
    ->name('products.filter');

Route::get('/products/sort', [ProductController::class, 'sort'])
    ->name('products.sort');


/*
|--------------------------------------------------------------------------
| Categories & Brands
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::resource('categories', CategoryController::class);

    Route::resource('brands', BrandController::class);

    Route::get(
        '/categories/{category}/products',
        [CategoryController::class, 'products']
    )->name('categories.products');

    Route::get(
        '/brands/{brand}/products',
        [BrandController::class, 'products']
    )->name('brands.products');

});


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

});


/*
|--------------------------------------------------------------------------
| Dashboards
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

});


// Admin Dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

});


// Customer Dashboard
Route::middleware(['auth', 'role:customer'])->group(function () {

    Route::get('/customer/dashboard', [CustomerController::class, 'index'])
        ->name('customer.dashboard');

});


/*
|--------------------------------------------------------------------------
| Orders
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:customer'])->group(function () {

    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/history', [OrderController::class, 'history'])
        ->name('orders.history');

    Route::get('/orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');

    Route::put('/orders/{order}/cancel', [OrderController::class, 'cancel'])
        ->name('orders.cancel');

});


/*
|--------------------------------------------------------------------------
| Reviews
|--------------------------------------------------------------------------
*/

Route::get('/reviews/product/{product}', [ReviewController::class, 'index'])
    ->name('reviews.index');

Route::post('/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store');

Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])
    ->name('reviews.edit');

Route::put('/reviews/{review}', [ReviewController::class, 'update'])
    ->name('reviews.update');

Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])
    ->name('reviews.destroy');


/*
|--------------------------------------------------------------------------
| Cart
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:customer'])->group(function () {

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::get('/cart/add/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::get('/cart/increase/{id}', [CartController::class, 'increase'])
        ->name('cart.increase');

    Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])
        ->name('cart.decrease');

    Route::get('/cart/delete/{id}', [CartController::class, 'delete'])
        ->name('cart.delete');

    Route::get('/checkout', [CartController::class, 'checkout'])
        ->name('cart.checkout');

    Route::post('/place-order', [CartController::class, 'placeOrder'])
        ->name('cart.placeOrder');

});