<?php

use App\Http\Controllers\DebtController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShopController;

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::resource('debtors', DebtorController::class);
Route::resource('debts', DebtController::class);
Route::resource('payments', PaymentController::class);
Route::resource('shops', ShopController::class);
