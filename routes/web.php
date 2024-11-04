<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanceController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('finances', \App\Http\Controllers\FinanceController::class);
Route::get('/monthly-report', [FinanceController::class, 'monthlyReport'])->name('monthly.report');
Route::get('/finances', [FinanceController::class, 'index'])->name('finances.index');