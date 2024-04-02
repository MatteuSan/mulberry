<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Section extends Component
{
  #[On('user-data-updated')]
  public function updateList(): void
  {
    $this->dispatch('$refresh');
  }

  public function render(): View
  {
    return view('components.livewire.admin.manage-users.section', [
      'users' => User::all()
    ]);
  }
}
