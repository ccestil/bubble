<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerTransactionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Customer\ProfileController;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/home', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // ... other admin routes
    Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');

    // Service routes
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::delete('/services/{service}/delete', [ServiceController::class, 'destroy'])->name('services.delete');

    // Transaction routes
    Route::get('/transactions', [TransactionController::class, 'index'])->name('admin.transaction');
    Route::get('/transactions/search', [TransactionController::class, 'search'])->name('admin.transactions.search');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::POST('/transactions/store', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit'); // Add this
    Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::get('/admin/transactions/search-customers', [TransactionController::class, 'searchCustomers'])->name('admin.transactions.searchCustomers');
    Route::resource('admin/transactions', TransactionController::class)->names([
        'destroy' => 'transactions.destroy',
    ]);

    // Employee routes
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index'); // optional: list employees
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update'); // For updating the edited employee
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    // Customer routes
    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers');


    // Routes for displaying the payment form and processing the payment
    Route::get('/transactions/{transaction}/pay', [PaymentController::class, 'showPaymentForm'])->name('admin.transactions.pay');
    Route::post('/transactions/{transaction}/process-payment', [PaymentController::class, 'processPayment'])->name('admin.transactions.process-payment');

});

// Unauthorized access routes
Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');

// User registration routes
Route::get('/users/create', [UserController::class, 'create'])->name('users.register');
Route::post('/users', [UserController::class, 'store'])->name('users.store');


// Customer side routes
Route::middleware(['auth'])->group(function () {
    Route::get('/customer', [CustomerDashboardController::class, 'index'])->name('customer.index');
    Route::get('/customer/profile', [CustomerDashboardController::class, 'profile'])->name('customer.profile');
    Route::get('/customer/transactions/{transaction}', [CustomerTransactionController::class, 'show'])->name('customer.transactions.show');
    Route::get('/customer/history', [CustomerTransactionController::class, 'history'])->name('customer.transactions.history');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('customer.profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('customer.profile.update');
});


// Customer Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Admin Auth routes
Route::get('/admin', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin', [AuthController::class, 'adminLogin']);
