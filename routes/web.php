<?php

use App\Http\Controllers\{
    Admin\LoginController,
    Admin\indexController,
    Admin\CustomerController,
    Admin\PropertyController,
    Admin\InvoiceController,
    Admin\PaymentController,
    Admin\BranchController,
    Admin\ProyekController,
    Admin\CalendarController,
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login'); });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'ajaxLogin'])->name('login.ajax');

Route::middleware('auth')->group(function () {
    Route::get('/index', [indexController::class, 'index'])->name('index');

    // Developer

    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');

    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');

    Route::get('/property', [PropertyController::class, 'index'])->name('property');

    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');


    // Kost

    Route::get('/branch', [BranchController::class, 'index'])->name('branch');

    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
