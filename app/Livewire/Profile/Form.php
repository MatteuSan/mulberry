<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
  #[Validate('string|required')]
  public string $firstName, $lastName;

  #[Validate('string|nullable')]
  public string|null $prefix, $middleName, $suffix;

  public function mount(): void
  {
    $this->prefix = auth()->user()->prefix;
    $this->firstName = auth()->user()->first_name;
    $this->middleName = auth()->user()->middle_name;
    $this->lastName = auth()->user()->last_name;
    $this->suffix = auth()->user()->suffix;
  }

  public function edit(): void
  {
    $user = auth()->user();
    $user->prefix = $this->prefix;
    $user->first_name = $this->firstName;
    $user->middle_name = $this->middleName;
    $user->last_name = $this->lastName;
    if ($user->suffix) $user->suffix = $this->suffix;
    $user->save();
    $this->redirect(route('profile'));
  }

  public function render(): View
  {
    return view('components.livewire.profile.form', [
      'user' => auth()->user()
    ]);
  }
}
