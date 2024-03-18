<?php

namespace App\Livewire\Auth;

use App\Models\Role;
use App\Models\User;
use Hash;

use Livewire\Component;

class RegisterForm extends Component
{
  public string $name = '';
  public string $email = '';
  public string $password = '';
  public string $role_id = '';

  public function register(): void
  {
    $this->validate([
      'name' => 'required|string',
      'email' => 'required|email|unique:users',
      'password' => 'required',
      'role_id' => 'required',
    ]);

    $role_id = match ($this->role_id) {
      'superuser' => 1,
      'staff' => 2,
      'student' => 3
    };

    User::create([
      'name' => $this->name,
      'email' => $this->email,
      'password' => Hash::make($this->password, ['rounds' => 12]),
      'role_id' => $role_id,
    ]);

    auth()->attempt($this->only('email', 'password'));
    redirect()->route('home');
  }

  public function render()
  {
    return view('livewire.auth.register-form', [
      'users' => User::all(),
      'roles' => Role::all(),
    ]);
  }
}
