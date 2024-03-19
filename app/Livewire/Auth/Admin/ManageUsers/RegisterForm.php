<?php

namespace App\Livewire\Auth\Admin\ManageUsers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RegisterForm extends Component
{
  #[Validate('required|string')]
  public string $username = '';

  #[Validate('required|string')]
  public string $prefix = '';
  #[Validate('required|string')]
  public string $firstName = '';

  #[Validate('string')]
  public string $middleName = '';

  #[Validate('required|string')]
  public string $lastName = '';

  #[Validate('string')]
  public string $suffix = '';

  #[Validate('required|string')]
  public string $name = '';

  #[Validate('required|email|unique:users')]
  public string $email = '';

  #[Validate('required')]
  public string $password = '';

  #[Validate('required')]
  public string $dob = '';

  #[Validate('required')]
  public int $batch;

  #[Validate('required')]
  public string $role_id = '';

  public function register(): void
  {
    $role_id = match ($this->role_id) {
      'superuser' => 1,
      'staff' => 2,
      'student' => 3
    };

    User::create([
      'name' => $this->name,
      'email' => $this->email,
      'password' => Hash::make($this->password),
      'role_id' => $role_id,
    ]);

    if ($role_id === 2) {
      $user = User::where('email', $this->email)->first();
      $user->staff()->create([
        'username' => $this->username,
        'prefix' => $this->prefix,
        'first_name' => $this->firstName,
        'middle_name' => $this->middleName,
        'last_name' => $this->lastName,
        'suffix' => $this->suffix,
      ]);
    } else if ($role_id === 3) {
      $user = User::where('email', $this->email)->first();
      $user->student()->create([
        'username' => $this->username,
        'prefix' => $this->prefix,
        'first_name' => $this->firstName,
        'middle_name' => $this->middleName,
        'last_name' => $this->lastName,
        'suffix' => $this->suffix,
      ]);
    }

    auth()->attempt($this->only('email', 'password'));
    redirect()->route('home');
  }

  public function render(): View
  {
    return view('livewire.auth.register-form', [
      'users' => User::all(),
      'roles' => Role::all(),
    ]);
  }
}
