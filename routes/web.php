<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    return view('home');
});

Route::resource('debtors', DebtorController::class);
Route::resource('shops', ShopController::class);
