<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
  public User $user;

  #[Validate('string|nullable')]
  public string|null $prefix;

  #[Validate('string|required')]
  public string $firstName;

  #[Validate('string|nullable')]
  public string|null $middleName;

  #[Validate('string|required')]
  public string $lastName;

  #[Validate('string|nullable')]
  public string|null $suffix;

  #[Validate('string|required|email')]
  public string $email;

  #[Validate('string|required')]
  public string $role;

  #[Validate('string|required')]
  public string $program;

  #[Validate('string')]
  public string $dob;

  #[Validate('integer|nullable')]
  public int|null $batch;

  public function mount(): void
  {
    $this->user = User::find($this->user->id);
  }

  public function edit(): void
  {
    $this->validate();
    $user = User::find($this->user->id);
    $user->prefix = $this->prefix;
    $user->first_name = $this->firstName;
    $user->middle_name = $this->middleName;
    $user->last_name = $this->lastName;
    $user->suffix = $this->suffix;
    $user->email = $this->email;
    $user->role_id = $this->role;
    $user->dob = $this->dob;
    if($this->role == 'student') {
      $this->user->student()->first()->batch = $this->batch;
      $this->user->student()->first()->program_id = Program::where('slug', $this->program)->first()->id;
    }
    redirect(route('admin.manage-users'));
  }

  public function render(): View
  {
    return view('components.livewire.admin.manage-users.edit', [
      'roles' => Role::all(),
      'programs' => Program::all(),
    ]);
  }
}
