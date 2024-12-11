<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaptopController;

Route::get('/', [LaptopController::class, 'index'])->name('laptops.index');
Route::get('/laptops/create', [LaptopController::class, 'create'])->name('laptops.create');
Route::post('/laptops', [LaptopController::class, 'store'])->name('laptops.store');
Route::get('/laptops/{laptop}/edit', [LaptopController::class, 'edit'])->name('laptops.edit');
Route::put('/laptops/{laptop}', [LaptopController::class, 'update'])->name('laptops.update');
Route::delete('/laptops/{laptop}', [LaptopController::class, 'destroy'])->name('laptops.destroy');