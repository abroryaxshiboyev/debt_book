<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DebtorController;

Route::get('/', function () {
    return view('home');
});

Route::resource('debtors', DebtorController::class);
