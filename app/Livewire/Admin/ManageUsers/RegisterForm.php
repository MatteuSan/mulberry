<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Models\Program;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RegisterForm extends Component
{
  #[Validate('required|string')]
  public string $username = '';

  #[Validate('string|nullable')]
  public string|null $prefix;
  #[Validate('required|string')]
  public string $firstName = '';

  #[Validate('string|nullable')]
  public string|null $middleName;

  #[Validate('required|string')]
  public string $lastName = '';

  #[Validate('string|nullable')]
  public string|null $suffix;

  #[Validate('required|string')]
  public string $name = '';

  #[Validate('required|email|unique:users')]
  public string $email = '';

  #[Validate('required|string')]
  public string $password = '';

  #[Validate('required|string')]
  public string $dob = '';

  #[Validate('required|int')]
  public int $batch;

  #[Validate('required|string')]
  public string $role_id;

  #[Validate('required|string')]
  public string $program_id;

  public function register(): void
  {
    $this->validate();
    User::create([
      'username' => $this->username,
      'prefix' => $this->prefix,
      'first_name' => $this->firstName,
      'middle_name' => $this->middleName,
      'last_name' => $this->lastName,
      'suffix' => $this->suffix,
      'email' => $this->email,
      'password' => Hash::make($this->password),
      'role_id' => Role::where('slug', $this->role_id)->first()->id,
      'dob' => $this->dob,
    ]);

    if ($this->role_id == 'student') {
      Student::create([
        'number' => $this->batch . str_replace('-', '', $this->dob),
        'year' => Carbon::today()->year - $this->batch,
        'user_id' => User::where('username', $this->username)->first()->id,
        'batch' => $this->batch,
        'program_id' => Program::where('slug', $this->program_id)->first()->id,
      ]);
    }

    redirect()->route('admin.manage-users');
  }

  public function render(): View
  {
    return view('components.livewire.admin.manage-users.register-form', [
      'roles' => Role::all(),
      'programs' => Program::all(),
    ]);
  }
}
