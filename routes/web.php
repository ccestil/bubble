<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/home', function () {
        return view('admin.dashboard');
    });

    // ... other admin routes
    Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('admin.transaction');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/customers', function () {
        return view('admin.customer');
    });
    Route::get('/employees', function () {
        return view('admin.employee');
    });
    Route::get('/inventory', function () {
        return view('admin.inventory');
    });
    Route::get('/services', function () {
        return view('admin.service');
    });
});

Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');

// User registration routes (outside admin middleware if customers can register)
Route::get('/users/create', [UserController::class, 'create'])->name('users.register');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::middleware(['auth'])->group(function () {
    // Customer routes (only once)
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    // Add other protected customer routes here
    // Route::get('/customer/profile', [CustomerController::class, 'profile'])->name('customer.profile');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Admin Auth routes
Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin']);


// Transaction routes
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::POST('/transactions/store', [TransactionController::class, 'store'])->name('transactions.store');
