<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class MUAppbarItem extends Component
{
  public function __construct(
    public string $route
  ) {}

  public function rn(string $routeName): bool
  {
    $baseRoute = explode('.', Route::currentRouteName())[0];
    return $baseRoute == $routeName;
  }

  public function render(): View|Closure|string
  {
    return view('components.mu-appbar-item', [
      'rn' => $this->rn($this->route),
      'route' => $this->route,
      'icon' => '',
    ]);
  }
}
