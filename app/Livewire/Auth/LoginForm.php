<?php

namespace App\Livewire\Auth;

use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class LoginForm extends Component
{
  #[Validate('email|required')]
  public string $email = '';

  #[Validate('required|min:4')]
  public string $password = '';

  public bool $remember = false;

  public function login(): void
  {
    $this->validate();
    if (!auth()->attempt($this->only('email', 'password'), $this->remember)) back()->with('message', 'Login failed! Check your user ID and password.');
    redirect()->route('home');
  }

  public function render(): View
  {
    return view('components.livewire.auth.login-form');
  }
}
