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
    Admin\KostPropertyController,
    Admin\KostPaymentController,
    Admin\KostCustomerController,
    Admin\CalendarController,
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login'); });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'ajaxLogin'])->name('login.ajax');

Route::middleware('auth')->group(function () {
    Route::get('/index', [indexController::class, 'index'])->name('index');
    //kost
    Route::get('/branch', [BranchController::class, 'index'])->name('branch');
    Route::get('/indexaddbranch', [BranchController::class, 'indexaddbranch'])->name('indexaddbranch');

    Route::get('/kostproperty', [KostPropertyController::class, 'index'])->name('kostproperty');

    Route::get('/kostpayment', [KostPaymentController::class, 'index'])->name('kostpayment');
    Route::get('/indexaddpaymentkost', [KostPaymentController::class, 'indexaddpaymentkost'])->name('indexaddpaymentkost');

    Route::get('/kostcustomer', [KostCustomerController::class, 'index'])->name('kostcustomer');

    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');

    //developer
    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');
    Route::get('/proyek/list', [ProyekController::class, 'getlistProyek'])->name('getlistProyek');
    Route::post('/storeProyek', [ProyekController::class, 'store'])->name('store');
    Route::put('/proyek/update/{id}', [ProyekController::class, 'updateproyek'])->name('updateproyek');
    Route::get('/proyek/{id}', [ProyekController::class, 'show']);
    Route::delete('/proyek/delete/{id}' , [ProyekController::class, 'deleteproyek'])->name('deleteproyek');

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::get('/indexaddpayment', [PaymentController::class, 'indexaddpayment'])->name('indexaddpayment');

    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');
    Route::get('/indexaddinvoice', [InvoiceController::class, 'indexaddinvoice'])->name('indexaddinvoice');

    Route::get('/property', [PropertyController::class, 'index'])->name('property');
    Route::get('/indexaddproperty', [PropertyController::class, 'indexaddproperty'])->name('indexaddproperty');

    // Customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customer/gelistcustomer', [CustomerController::class, 'gelistcustomer'])->name('customer.list');
    Route::get('customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
