<?php

namespace App\View\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\View\Component;

class MSFormField extends Component
{
  public function __construct(
    public string $name,
    public string $label,
    public string|null $type = 'text',
    public string|null $value = '',
    public string|null $helper = '',
    public bool $required = false,
    public bool $disabled = false,
  ) {}

  public function render(): Factory|Application|View|Htmlable|string|\Closure|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
  {
    return view('components.ms-form-field');
  }
}