<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;

Route::get('/', [SaleController::class, 'index'])->name('sales.index');
