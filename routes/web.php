<?php

use App\Http\Controllers\Auth\InController;
use App\Http\Controllers\Auth\OutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Academics;
use App\Http\Controllers\Admin;

Route::get('/login', [InController::class, 'login_render'])->name('login');
Route::post('/login', [InController::class, 'login'])->name('login.store');

Route::middleware(['auth'])->group(function () {
  Route::get('/', [HomeController::class, 'render'])->name('home');

  Route::get('/academics', [Academics\MainController::class, 'render'])->name('academics');
  Route::get('/academics/announcements', [Academics\AnnouncementController::class, 'render'])->name('academics.announcements');
  Route::get('/academics/announcement/{id}', [Academics\AnnouncementController::class, 'render_once'])->name('academics.announcements.id');

  Route::get('/enrollment', function() { return view('main.enrollment'); })->name('enrollment');
  Route::get('/profile', function() { return view('main.profile'); })->name('profile');

  Route::group(['prefix' => 'admin'], function () {
    Route::get('/register', [InController::class, 'register_render'])->name('register');
    Route::post('/register', [InController::class, 'register'])->name('register.store');
    Route::get('/announcements', [Admin\AnnouncementController::class, 'render'])->name('admin.announcements');
    Route::get('/announcements/edit/{id}', [Admin\AnnouncementController::class, 'editRender'])->name('admin.announcements.edit');
  })->middleware(['admin']);

  Route::get('/logout', [OutController::class, 'logout'])->name('logout');
});