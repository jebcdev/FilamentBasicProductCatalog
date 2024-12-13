<?php

use App\Http\Controllers\_SiteController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}/details', [ProductController::class, 'details'])->name('products.details');
Route::get('/products/categories', [ProductController::class, 'categories'])->name('products.categories');
Route::get('/products/categories/{category}/products', [ProductController::class, 'productsByCategory'])->name('products.categories.products');


require __DIR__ . '/_site.php';
require __DIR__ . '/auth.php';
