<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanceController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('finances', \App\Http\Controllers\FinanceController::class);
Route::get('finances/report', [\App\Http\Controllers\FinanceController::class, 'monthlyReport'])->name('finances.report');
Route::get('/finances', [FinanceController::class, 'index'])->name('finances.index');
