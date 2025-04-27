<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', [UserController::class, 'create'])->name('register');
Route::post('/store', [UserController::class, 'store'])->name('store');

Route::get('/services.create', [ServiceController::class, 'create'])->name('service.create');
Route::post('/services.store', [ServiceController::class, 'store'])->name('service.store');