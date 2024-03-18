<?php

namespace App\Livewire\Announcement\Admin;

use App\Models\Announcement;
use Livewire\Component;

class Form extends Component
{
  public string $title = '';
  public string $content = '';

  public function createAnnouncement(): void
  {
    $this->validate([
      'title' => 'required',
      'content' => 'required',
    ]);
    Announcement::create([
      'title' => $this->title,
      'content' => $this->content,
      'user_id' => auth()->id(),
    ]);

    $this->dispatch('announcements-admin-updated');
  }

  public function render()
  {
    return view('livewire.announcement.admin.form');
  }
}
