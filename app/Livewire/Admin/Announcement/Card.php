<?php

namespace App\Livewire\Admin\Announcement;

use App\Models\Announcement;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Card extends Component
{
  public int $id;
  public string $title,
                $content,
                $author;
  public Carbon $created_at,
                $updated_at;

  public function placeholder(): View
  {
    return view('components.livewire.announcement.skeleton');
  }

  public function delete(): void
  {
    Announcement::destroy($this->id);
    $this->dispatch('announcements-admin-updated');
  }

  public function render(): View
  {
    return view('components.livewire.admin.announcement.card');
  }
}
