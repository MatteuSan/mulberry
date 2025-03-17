<?php

namespace App\View\Components;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Illuminate\View\View;

class MSButton extends Component
{
  public function __construct(
    public string|null $type = '',
    public string|null $link = '',
    public string|null $nativeType = '',
    public bool $isDisabled = false
  ) {}

  function handleTypes(): string
  {
    $finalTypes = [];
    $types = explode(' ', $this->type);
    foreach ($types as $type) $finalTypes[] = "is-$type";
    return implode(" ", $finalTypes);
  }

  private function handleLinkTarget(string $fallbackTarget = '_self'): string
  {
    if (Route::getRoutes()->hasNamedRoute($this->link)) return route($this->link);
    $isExternal = (str_contains($this->link, 'http://') || str_contains($this->link, 'https://')) && !Route::getRoutes()->hasNamedRoute($this->link);
    return $isExternal ? '_blank' : $fallbackTarget;
  }

  private function handleLink(): string
  {
    if (Route::getRoutes()->hasNamedRoute($this->link)) return route($this->link);
    return $this->link;
  }

  public function render(): View|Closure|string
  {
    return view('components.ms-button', [
      'linkTarget' => $this->handleLinkTarget(),
      'link' => $this->handleLink(),
      'type' => $this->handleTypes(),
    ]);
  }
}
