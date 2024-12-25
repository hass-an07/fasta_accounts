<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\CroController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\MemberInvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;




Route::get('/login', [Authcontroller::class, 'login'])->name('account.login');
Route::post('/login', [Authcontroller::class, 'authenticate'])->name('account.authenticate');
Route::get('/register', [Authcontroller::class, 'register'])->name('account.register');
Route::post('/process-register', [Authcontroller::class, 'processregister'])->name('account.processregister');


Route::middleware(AuthMiddleware::class)->group(function(){

    Route::get('/',[DashboardController::class,'showHome'])->name('showHome');
    
    
    Route::resource('/dashboard',DashboardController::class);
    Route::resource('/customer',CustomerController::class);
    Route::resource('/cro',CroController::class);
    Route::resource('/product',ProductController::class);
    Route::resource('/invoices',InvoicesController::class);
    Route::resource('/memberInvoice',MemberInvoiceController::class);
    Route::get('/memberInvoice/{id}/print', [MemberInvoiceController::class, 'print'])->name('memberInvoice.print');
    Route::get('/invoices/{id}/print', [InvoicesController::class, 'print'])->name('invoices.print');
    Route::get('/logout', [Authcontroller::class, 'logout'])->name('account.logout');
    
});

