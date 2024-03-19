<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Attributes\Js;
use Livewire\Component;

class MSFormField extends Component
{
  public string $name;
  public string $label;
  public string $value = '';
  public string $type = 'text';
  public string $helper = '';
  public bool $required = false;
  public bool $disabled = false;
  public Js|string|null $alpineModel = null;
  public string $width = 'w-full';

  public function render(): View
  {
    return view('livewire.components.ms-form-field');
  }
}
