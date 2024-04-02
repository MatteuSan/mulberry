<?php

namespace App\Livewire\Auth;

use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginForm extends Component
{
  #[Validate('email|required')]
  public string $email = '';

  #[Validate('required|min:4')]
  public string $password = '';

  public function login(): void
  {
    $this->validate();
    if (!auth()->attempt($this->only('email', 'password'))) back()->with('message', 'Invalid login details.');
    redirect()->route('home');
  }

  public function render(): View
  {
    return view('components.livewire.auth.login-form');
  }
}
