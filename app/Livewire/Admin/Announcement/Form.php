<?php

namespace App\Livewire\Admin\Announcement;

use App\Models\Announcement;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
  #[Validate('required|max:100')]
  public string $title = '';

  #[Validate('required')]
  public string $content = '';

  public function createAnnouncement(): void
  {
    $this->validate();

    Announcement::create([
      'title' => $this->title,
      'content' => $this->content,
      'user_id' => auth()->id(),
    ]);

    $this->reset(['title', 'content']);
    $this->dispatch('announcement-created');
  }

  public function render()
  {
    return view('components.livewire.admin.announcement.form');
  }
}
