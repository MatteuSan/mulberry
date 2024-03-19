<?php

namespace App\Livewire\Announcement\Admin;

use App\Models\Announcement;
use App\Models\ReadAnnouncement;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Section extends Component
{
  #[On('announcements-admin-updated')]
  public function updateList(): void
  {
    $this->dispatch('$refresh');
  }

  public function render(): View
  {
    return view('livewire.announcement.admin.section', [
      'announcements' => Announcement::orderBy('updated_at', 'desc')->get(),
      'readAnnouncements' => ReadAnnouncement::where('user_id', auth()->id())->get()
    ]);
  }
}
