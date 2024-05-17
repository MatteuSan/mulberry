<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Models\Department;
use App\Models\Program;
use App\Models\Role;
use App\Models\Staff;
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
  public string|null $prefix = null;
  #[Validate('required|string')]
  public string $firstName = '';

  #[Validate('string|nullable')]
  public string|null $middleName = null;

  #[Validate('required|string')]
  public string $lastName = '';

  #[Validate('string|nullable')]
  public string|null $suffix = null;

  #[Validate('required|email|unique:users')]
  public string $email = '';

  #[Validate('required|string')]
  public string $password = '';

  #[Validate('required|string', as: 'date of birth')]
  public string $dob = '';

  #[Validate('required|string')]
  public string $role = 'superuser';

  #[Validate('nullable|int')]
  public int|null $batch;

  #[Validate('nullable|string')]
  public string|null $program;

  #[Validate('nullable|string')]
  public string|null $department;

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
      'dob' => $this->dob,
      'role_id' => Role::where('slug', $this->role)->first()->id
    ]);

    if ($this->role === 'student') {
      Student::create([
        'number' => $this->batch . str_replace('-', '', $this->dob),
        'year' => Carbon::today()->year - $this->batch,
        'batch' => $this->batch,
        'user_id' => User::where('email', $this->email)->first()->id,
        'program_id' => Program::where('slug', $this->program)->first()->id,
      ]);
    } else {
      Staff::create([
        'number' => Carbon::now()->year . str_replace('-', '', $this->dob),
        'user_id' => User::where('email', $this->email)->first()->id,
        'role_id' => Role::where('slug', $this->role)->first()->id,
        'department_id' => Department::where('slug', $this->department)->first()->id
      ]);
    }

    $this->dispatch('user-list-updated');
  }

  public function render(): View
  {
    return view('components.livewire.admin.manage-users.register-form', [
      'roles' => Role::all(),
      'programs' => Program::all(),
      'departments' => Department::all()
    ]);
  }
}
