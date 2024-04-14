<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Livewire\Component;

class Card extends Component
{
  public int $id;
  public string $firstName,
                $lastName,
                $role;
  public string|null $prefix,
                     $suffix,
                     $middleName;
  public Carbon $created_at,
                $updated_at;

  public function placeholder(): View
  {
    return view('components.livewire.announcement.skeleton');
  }

  public function delete(): void
  {
    User::destroy($this->id);
    $this->dispatch('user-list-updated');
  }

  public function render(): View
  {
    return view('components.livewire.admin.manage-users.card');
  }
}
