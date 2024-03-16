<?php

use App\Http\Controllers\Auth\InController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'render'])->name('home');

Route::get('/register', [InController::class, 'register_render'])->name('register');
Route::post('/register', [InController::class, 'register'])->name('register.store');
Route::get('/login', [InController::class, 'login_render'])->name('login');
Route::post('/login', [InController::class, 'login'])->name('login.store');
Route::post('/logout', [InController::class, 'logout'])->name('logout');