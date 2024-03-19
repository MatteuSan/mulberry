<?php

namespace App\Livewire\Auth\Admin\ManageUsers;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Search extends Component
{
  #[Validate('required|string')]
  public string $query = '';

  #[Validate('string')]
  public string $filter = '';

  public function render(): View
  {
    $results = [];
    if (strlen($this->query) >= 1) {
      if ($this->filter === 'role_id') {
        $filteredQuery = strtolower($this->query);
        $filteredQuery = match ($filteredQuery) {
          'superuser' => 1,
          'staff' => 2,
          'student' => 3,
          default => $this->query,
        };
        $results = User::where("role_id", "=" , "%$filteredQuery%")
          ->limit(10)->get();
      } else {
        $results = User::where("name", 'like', "%$this->query%")
          ->orWhere("email", 'like', "%$this->query%")
          ->limit(10)->get();
      }
    }

    return view('livewire.auth.admin.manage-users.search', [
      'results' => $results,
    ]);
  }
}
