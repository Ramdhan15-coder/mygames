<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GameController;



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

// Route untuk Mobile Legends
Route::get('/game/ml', [GameController::class, 'ml'])->name('game.ml');

// Route untuk Free Fire
Route::get('/game/ff', [GameController::class, 'ff'])->name('game.ff');

// Route untuk PUBG
Route::get('/game/pubg', [GameController::class, 'pubg'])->name('game.pubg');

Route::get('/game/hok', [GameController::class, 'hok'])->name('game.hok');

// Route untuk Free Fire
Route::get('/game/genshin', [GameController::class, 'genshin'])->name('game.genshin');

// Route untuk PUBG
Route::get('/game/bola', [GameController::class, 'bola'])->name('game.bola');

