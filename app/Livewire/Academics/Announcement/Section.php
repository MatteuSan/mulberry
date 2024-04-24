<?php

namespace App\Livewire\Academics\Announcement;

use App\Models\Announcement;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Section extends Component
{
  use WithPagination, WithoutUrlPagination;

  protected $announcements;
  protected $readAnnouncements;

  public function mount(): void
  {
    $this->announcements = Announcement::orderBy('updated_at', 'desc')->paginate(5);
  }

  public function render(): View
  {
    $this->announcements = Announcement::orderBy('updated_at', 'desc')->paginate(5);
    return view('components.livewire.academics.announcement.section', [
      'announcements' => $this->announcements,
      'currentPassFilter' => fn (Announcement $announcement) => $announcement->created_at->diffInMilliseconds() <= auth()->user()->created_at->diffInMilliseconds(),
    ]);
  }
}
