<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MUAppbarItem extends Component
{
  public function rn(string $routeName): bool
  {
    $baseRoute = explode('.', Route::currentRouteName())[0];
    return $baseRoute == $routeName;
  }

  public function __construct()
  {
  }

  public function render(): View|Closure|string
  {
    return view('components.mu-appbar-item');
  }
}
