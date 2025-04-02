<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

use App\Http\Middleware\AdminMiddleware;

// Página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');

    // Rutas para categorías
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::put('categories/{id}/reactivate', [\App\Http\Controllers\Admin\CategoryController::class, 'reactivate'])->name('categories.reactivate');

    // Rutas para productos
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::put('products/{id}/reactivate', [\App\Http\Controllers\Admin\ProductController::class, 'reactivate'])->name('products.reactivate');

    // Rutas para usuarios
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::put('users/{id}/reactivate', [\App\Http\Controllers\Admin\UserController::class, 'reactivate'])->name('users.reactivate');

    // Rutas para ventas
    Route::resource('sales', \App\Http\Controllers\Admin\SalesController::class)->only(['index', 'show', 'destroy']);
    Route::put('sales/{id}/reactivate', [\App\Http\Controllers\Admin\SalesController::class, 'reactivate'])->name('sales.reactivate');
});

// Rutas públicas (catálogo de productos)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');  // Ver productos
Route::get('/productos', [HomeController::class, 'showProducts'])->name('home.mostrarproductos');

// Carrito de compras
Route::middleware(['web'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{productId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
});

// Página "Nosotros"
Route::get('/about', function () {
    return view('home.about');
})->name('home.about');