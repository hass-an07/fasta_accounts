<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\CroController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/dashboard',DashboardController::class);
Route::resource('/customer',CustomerController::class);
Route::resource('/cro',CroController::class);
Route::resource('/product',ProductController::class);
Route::resource('/invoices',InvoicesController::class);
Route::get('/invoices/{id}/print', [InvoicesController::class, 'print'])->name('invoices.print');

Route::get('/login', [Authcontroller::class, 'login'])->name('account.login');
Route::post('/login', [Authcontroller::class, 'authenticate'])->name('account.authenticate');
Route::get('/register', [Authcontroller::class, 'register'])->name('account.register');
Route::post('/process-register', [Authcontroller::class, 'processregister'])->name('account.processregister');
Route::get('/logout', [Authcontroller::class, 'logout'])->name('account.logout');
