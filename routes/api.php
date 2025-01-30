<?php

use App\Http\Controllers\DebtController;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShopController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('shops', ShopController::class);
// Route::apiResource('debtors', DebtorController::class);
// Route::apiResource('debts',DebtController::class);
// Route::apiResource('payments', PaymentController::class);
