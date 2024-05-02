<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Academics;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Enrollment;
use App\Http\Controllers\Profile;

Route::get('/login', [LoginController::class, 'render'])->name('login');

Route::middleware(['auth'])->group(function () {
  Route::get('/', [HomeController::class, 'render'])->name('home');

  Route::get('/academics', [Academics\MainController::class, 'render'])->name('academics');
  Route::get('/academics/announcements', [Academics\AnnouncementController::class, 'render'])->name('academics.announcements');
  Route::get('/academics/announcement/{id}', [Academics\AnnouncementController::class, 'renderOnce'])->name('academics.announcements.id');
  Route::get('/academics/schedule', [Academics\ScheduleController::class, 'render'])->name('academics.schedule');
  Route::get('/academics/grades', [Academics\GradesController::class, 'render'])->name('academics.grades');

  Route::get('/enrollment', [Enrollment\MainController::class, 'render'])->name('enrollment');
  Route::get('/enrollment/load', [Enrollment\LoadController::class, 'render'])->name('enrollment.load');

  Route::get('/profile', [Profile\MainController::class, 'render'])->name('profile');
  Route::get('/profile/edit', [Profile\ProfileController::class, 'render'])->name('profile.edit');
  Route::get('/profile/documents', [Profile\DocumentController::class, 'render'])->name('profile.documents');

  Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
      return view('pages.admin.index');
    })->name('admin');
    Route::middleware(['staff'])->group(function () {
      Route::get('/announcements', [Admin\AnnouncementController::class, 'render'])->name('admin.announcements');
      Route::get('/announcements/edit/{id}', [Admin\AnnouncementController::class, 'renderEdit'])->name('admin.announcements.edit');

      Route::get('/enrollment/manage/{id}', [Admin\EnrollmentController::class, 'renderOnce'])->name('admin.enrollment.manage');

    });
    Route::middleware(['admin'])->group(function () {
      Route::get('/manage-users', [Admin\MangeUsersController::class, 'render'])->name('admin.manage-users');
      Route::get('/manage-users/user/edit/{id}', [Admin\MangeUsersController::class, 'renderEdit'])->name('admin.manage-users.edit');
    });
  });

  Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});