<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Attributes\Js;
use Livewire\Component;

class MSFormField extends Component
{
  public string $label;
  public string $value = '';
  public string $type = 'text';
  public string $helper = '';
  public Js|string|null $alpineModel = null;
  public string|null $wireModel = null;

  public function render(): View
  {
    return view('components.livewire.components.ms-form-field', ['type' => 'text']);
  }
}
