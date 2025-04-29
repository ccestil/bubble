<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('admin.dashboard');
});

Route::get('/customers', function () {
    return view('admin.customer');
});

Route::get('/employees', function () {
    return view('admin.employee');
});

Route::get('/users/create', [UserController::class, 'create'])->name('users.register');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');


// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('account.login');

// Customer routes
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');

// Transaction routes
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');