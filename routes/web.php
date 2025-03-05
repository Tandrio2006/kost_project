<?php

use App\Http\Controllers\{
    Admin\LoginController,
    Admin\indexController,
    Admin\CustomerController,
    Admin\PropertyController,
    Admin\InvoiceController,
    Admin\PaymentController,
    Admin\KostController,
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login'); });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'ajaxLogin'])->name('login.ajax');

Route::middleware('auth')->group(function () {
    Route::get('/index', [indexController::class, 'index'])->name('index');

    Route::get('/kost', [KostController::class, 'index'])->name('kost');

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');

    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');

    Route::get('/property', [PropertyController::class, 'index'])->name('property');

    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
