<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IssueController;


Route::get('/', [IssueController::class, 'index'])->name('issues.index');
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');
Route::get('/issues/{issue}/edit', [IssueController::class, 'edit'])->name('issues.edit');
Route::put('/issues/{issue}', [IssueController::class, 'update'])->name('issues.update');
Route::delete('/issues/{issue}', [IssueController::class, 'destroy'])->name('issues.destroy');

