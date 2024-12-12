<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HardwareDeviceController;

Route::get('/', [HardwareDeviceController::class, 'index'])->name('devices.index');
Route::get('/devices/create', [HardwareDeviceController::class, 'create'])->name('devices.create');
Route::post('/devices', [HardwareDeviceController::class, 'store'])->name('devices.store');
Route::get('/devices/{device}/edit', [HardwareDeviceController::class, 'edit'])->name('devices.edit');
Route::put('/devices/{device}', [HardwareDeviceController::class, 'update'])->name('devices.update');
Route::delete('/devices/{device}', [HardwareDeviceController::class, 'destroy'])->name('devices.destroy');

