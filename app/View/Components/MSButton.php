<?php

namespace App\View\Components;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Illuminate\View\View;

class MSButton extends Component
{
  public function __construct(
    public string $type = '',
    public string $link = '',
  ) {}

  private static function isRouteName(string $routeName): bool
  {
    return Route::getRoutes()->hasNamedRoute($routeName);
  }

  public static function handleLink(string $link, string $fallbackTarget = '_self'): string
  {
    if (self::isRouteName($link)) return route($link);
    $isExternal = (str_contains($link, 'http://') || str_contains($link, 'https://')) && !self::isRouteName($link);
    return $isExternal ? '_blank' : $fallbackTarget;
  }

  public static function handleTypes(string $types): string
  {
    $finalTypes = [];
    $types = explode(' ', $types);
    foreach ($types as $type) $finalTypes[] = "is-$type";
    return implode(" ", $finalTypes);
  }

  public function render(): View|Closure|string
  {
    return view('components.ms-button');
  }
}
