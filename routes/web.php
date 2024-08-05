<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Auth;

// Authentication routes (Laravel Breeze)
Auth::routes([
    'register' => true, // Allows registration
    'reset' => true,    // Allows password reset
    'verify' => true,   // Allows email verification
]); 

// Homepage route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Public product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Admin routes for managing products
Route::middleware('admin')->group(function () {
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});


// Order routes (requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index'); // List orders
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store'); // Place a new order
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show'); // View order details
});

// Admin routes for managing orders
Route::middleware('admin')->group(function () {
    Route::put('/admin/orders/{order}', [OrderController::class, 'update'])->name('orders.update'); // Update order status
    Route::delete('/admin/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy'); // Cancel order
});

// Public blog post routes
Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogPostController::class, 'show'])->name('blog.show');

// Admin routes for managing blog posts
Route::middleware('admin')->group(function () {
    Route::get('/admin/blog/create', [BlogPostController::class, 'create'])->name('blog.create');
    Route::post('/admin/blog', [BlogPostController::class, 'store'])->name('blog.store');
    Route::get('/admin/blog/{post}/edit', [BlogPostController::class, 'edit'])->name('blog.edit');
    Route::put('/admin/blog/{post}', [BlogPostController::class, 'update'])->name('blog.update');
    Route::delete('/admin/blog/{post}', [BlogPostController::class, 'destroy'])->name('blog.destroy');
});

Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');
