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

  public function render(): View|Closure|string
  {
    return view('components.ms-button');
  }
}
