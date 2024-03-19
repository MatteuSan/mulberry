<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class MUAppbarDropDownItem extends Component
{
  public function __construct(
    public string $route
  ) {}

  public function rn(string $routeName): bool
  {
    return Route::currentRouteName() == $routeName;
  }

  public function render(): View|Closure|string
  {
    return view('components.mu-appbar-dropdown-item');
  }
}
