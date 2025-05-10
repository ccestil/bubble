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

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/home', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // ... other admin routes
    Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('admin.transaction');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');

    // Transaction routes
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::POST('/transactions/store', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit'); // Add this
    Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::resource('admin/transactions', TransactionController::class)->names([
        'destroy' => 'transactions.destroy',
    ]);

    // EMPLOYEE ROUTES
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index'); // optional: list employees
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update'); // For updating the edited employee
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');


    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers');


    // Routes for displaying the payment form and processing the payment
    Route::get('/transactions/{transaction}/pay', [PaymentController::class, 'showPaymentForm'])->name('admin.transactions.pay');
    Route::post('/transactions/{transaction}/process-payment', [PaymentController::class, 'processPayment'])->name('admin.transactions.process-payment');


    // Route::get('/customers', function () {
    //     return view('admin.customer');
    // });
    // Route::get('/employees', function () {
    //     return view('admin.employee');
    // });
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
    Route::get('/customer', [CustomerDashboardController::class, 'index'])->name('customer.index');
    Route::get('/customer/profile', [CustomerDashboardController::class, 'profile'])->name('customer.profile');
    Route::get('/customer/transactions/{transaction}', [CustomerTransactionController::class, 'show'])->name('customer.transactions.show');
    Route::get('/customer/history', [CustomerTransactionController::class, 'history'])->name('customer.transactions.history');
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
Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit'); // Add this
Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
