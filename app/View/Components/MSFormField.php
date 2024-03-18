<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MSFormField extends Component
{
  public function __construct(
    public string $name,
    public string $label,
    public string $type = 'text',
    public string $value = '',
    public string $helper = '',
    public bool $required = false,
    public bool $disabled = false,
  ) {}

  public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|View|\Illuminate\Contracts\Support\Htmlable|string|\Closure|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
  {
    return view('components.ms-form-field');
  }
}