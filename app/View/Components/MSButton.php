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
    public string $nativeType = '',
    public bool $isDisabled = false
  ) {}

  private function isRouteName(string $routeName): bool
  {
    return Route::getRoutes()->hasNamedRoute($routeName);
  }

  public function handleLinkTarget(string $link, string $fallbackTarget = '_self'): string
  {
    if ($this->isRouteName($link)) return route($link);
    $isExternal = (str_contains($link, 'http://') || str_contains($link, 'https://')) && !$this->isRouteName($link);
    return $isExternal ? '_blank' : $fallbackTarget;
  }

  public function handleLink(string $link): string
  {
    if($this->isRouteName($link)) return route($link);
    return $link;
  }

  public function handleTypes(string $types): string
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
