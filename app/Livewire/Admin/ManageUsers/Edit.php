<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Models\Department;
use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
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
  public string|null $suffix = '';

  #[Validate('string|required|email')]
  public string $email;

  #[Validate('string|required')]
  public string $dob;

  #[Validate('string|required')]
  public string $role;

  #[Validate('integer|nullable')]
  public int|null $batch = 0000;

  #[Validate('string|nullable')]
  public string|null $program;

  #[Validate('string|nullable')]
  public string|null $department;

  public function mount(): void
  {
    $this->user = User::find($this->user->id);
    $this->department = $this->user->staff?->department?->slug;
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
    $user->role_id = Role::where('slug', $this->role)->first()->id;
    $user->dob = $this->dob;

    if ($this->role == 'student') {
      if (!$user->student) {
        $user->student()->create([
          'user_id' => $user->id,
          'number' => $this->batch . str_replace('-', '', $this->dob),
          'batch' => $this->batch,
          'year' => Carbon::now()->year - $this->batch,
          'program_id' => Program::where('slug', $this->program)->first()->id,
        ]);
      } else {
        $user->student->batch = $this->batch;
        $user->student->program_id = Program::where('slug', $this->program)->first()->id;
      }
    } else {
      if (!$user->staff) {
        $user->staff()->create([
          'user_id' => $user->id,
          'number' => $this->batch . str_replace('-', '', $this->dob),
          'role_id' => Role::where('slug', $this->role)->first()->id,
          'department_id' => Department::where('slug', $this->department)->first()->id,
        ]);
      } else {
        $user->staff->department_id = Department::where('slug', $this->department)->first()->id;
      }
    }

    $user->save();
    redirect(route('admin.manage-users'));
  }

  public function delete(): void
  {
    User::destroy($this->user->id);
    redirect(route('admin.manage-users'));
  }

  public function render(): View
  {
    return view('components.livewire.admin.manage-users.edit', [
      'roles' => Role::all(),
      'programs' => Program::all(),
      'departments' => Department::all(),
    ]);
  }
}
