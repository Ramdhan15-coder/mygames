<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('app');
});


// Halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Proses login
Route::post('/login', [AuthController::class, 'login']);
// Proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/dashboard-user', [AuthController::class, 'dashboard'])->name('dashboard-user');

