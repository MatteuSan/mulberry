<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Blade::if('staff', fn() => auth()->user() && auth()->user()->role_id === 2 && auth()->user()->role_id !== 3 || auth()->user()->role_id === 1);
    Blade::if('admin', fn() => auth()->user() && auth()->user()->role_id === 1);
  }
}
