<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Academics;
use App\Http\Controllers\Admin;

Route::get('/login', [LoginController::class, 'login_render'])->name('login');

Route::middleware(['auth'])->group(function () {
  Route::get('/', [HomeController::class, 'render'])->name('home');

  Route::get('/academics', [Academics\MainController::class, 'render'])->name('academics');
  Route::get('/academics/announcements', [Academics\AnnouncementController::class, 'render'])->name('academics.announcements');
  Route::get('/academics/announcement/{id}', [Academics\AnnouncementController::class, 'renderOnce'])->name('academics.announcements.id');

  Route::get('/enrollment', function () { return view('pages.main.enrollment'); })->name('enrollment');
  Route::get('/profile', function () { return view('pages.main.profile'); })->name('profile');

  Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
      return view('pages.admin.index');
    })->name('admin');
    Route::middleware(['staff'])->group(function () {
      Route::get('/announcements', [Admin\AnnouncementController::class, 'render'])->name('admin.announcements');
      Route::get('/announcements/edit/{id}', [Admin\AnnouncementController::class, 'editRender'])->name('admin.announcements.edit');
    });
    Route::middleware(['admin'])->group(function () {
      Route::get('/manage-users', [Admin\MangeUsersController::class, 'render'])->name('admin.manage-users');
      Route::get('/manage-users/user/edit/{id}', [Admin\MangeUsersController::class, 'editRender'])->name('admin.manage-users.edit');
    });
  });

  Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});