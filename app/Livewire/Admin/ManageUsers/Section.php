<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Section extends Component
{
  use WithPagination, WithoutUrlPagination;

  #[Validate('string')]
  public string $searchQuery = '';

  #[Validate('string')]
  public string $roleFilter = 'all';

  public Collection $roles;

  public Collection $programs;

  public function mount(): void
  {
    $this->roles = Role::all();
    $this->programs = Program::all();
  }

  #[On('user-list-updated')]
  public function updateSection(): void
  {
    $this->resetPage();
  }

  public function render(): View
  {
    $users = User::when($this->roleFilter !== 'all', fn (Builder $query) => $query->where('role_id', $this->roleFilter))
      ->when($this->searchQuery !== '', fn (Builder $query) => $query->where(DB::raw("CONCAT(first_name, ' ', middle_name, ' ', last_name)"), 'like', "%$this->searchQuery%"))
      ->paginate(15);

    return view('components.livewire.admin.manage-users.section', [
      'users' => $users,
    ]);
  }
}
