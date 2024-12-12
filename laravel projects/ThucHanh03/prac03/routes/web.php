<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

Route::get('/', [IssueController::class, 'index'])->name('issues.index');

// Hiển thị form tạo vấn đề mới
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');

// Lưu vấn đề mới
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');

// Hiển thị chi tiết vấn đề
Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');

// Hiển thị form chỉnh sửa vấn đề
Route::get('/issues/{id}/edit', [IssueController::class, 'edit'])->name('issues.edit');

// Cập nhật vấn đề
Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update');

// Xóa vấn đề
Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');
