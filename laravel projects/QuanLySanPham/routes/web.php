<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route danh sách sản phẩm
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// Route tạo sản phẩm mới
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route chỉnh sửa sản phẩm
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Route xóa sản phẩm
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Route hiển thị chi tiết sản phẩm
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
