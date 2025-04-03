<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Rutas Públicas y de Clientes
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Catálogo de productos y detalles (clientes)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/productos', [HomeController::class, 'showProducts'])->name('home.mostrarproductos');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('home.show');

// Página "Nosotros"
Route::get('/about', function () {
    return view('home.about');
})->name('home.about');

// Rutas de autenticación y perfil para clientes
// Se elimina la ruta que utiliza ProfileController para evitar conflictos
Route::get('/profile', function () {
    return view('home.perfil');
})->middleware('auth')->name('profile');

// Rutas personalizadas de autenticación para clientes
Route::get('/login', function () {
    return view('home.login');
})->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.submit');
Route::get('/register', function () {
    return view('home.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas del carrito de compras (clientes)
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{productId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

/*
|--------------------------------------------------------------------------
| Rutas de Administración
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware(['auth', AdminMiddleware::class])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Categorías
    Route::resource('categories', CategoryController::class);
    Route::put('categories/{id}/reactivate', [CategoryController::class, 'reactivate'])->name('categories.reactivate');

    // Productos
    Route::resource('products', ProductController::class);
    Route::put('products/{id}/reactivate', [ProductController::class, 'reactivate'])->name('products.reactivate');

    // Usuarios
    Route::resource('users', UserController::class);
    Route::put('users/{id}/reactivate', [UserController::class, 'reactivate'])->name('users.reactivate');

    // Ventas
    Route::resource('sales', SalesController::class)->only(['index', 'show', 'destroy']);
    Route::put('sales/{id}/reactivate', [SalesController::class, 'reactivate'])->name('sales.reactivate');

    // Reportes
    Route::get('reports/products', [ReportController::class, 'productsReport'])->name('reports.products');
    Route::get('reports/users', [ReportController::class, 'usersReport'])->name('reports.users');
    Route::get('reports/sales', [ReportController::class, 'salesReport'])->name('reports.sales');

    // Perfil de administradores (rutas separadas)
    Route::get('/profile', [AdminProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
});

// Carga de rutas de Breeze o similares (si las tienes)
require __DIR__.'/auth.php';
