<?php

namespace App\Livewire\Admin\Announcement;

use App\Models\Announcement;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Section extends Component
{
  protected $announcements;

  public function boot(): void
  {
    $this->announcements = Announcement::orderBy('updated_at', 'desc')->get();
  }

  #[On('announcement-created')]
  public function updateSection(): void
  {
    $this->announcements = Announcement::orderBy('updated_at', 'desc')->get();
  }

  public function render(): View
  {
    return view('components.livewire.admin.announcement.section', [
      'announcements' => $this->announcements,
    ]);
  }
}
