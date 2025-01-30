<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DebtorController;

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::resource('debtors', DebtorController::class);
