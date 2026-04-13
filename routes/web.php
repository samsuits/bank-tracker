<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return redirect('/banks');
});


Route::resource('banks', BankController::class)
    ->only(['index','create','store']);
Route::resource('transactions', TransactionController::class)
    ->only(['index','create','store']);