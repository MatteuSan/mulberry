<?php

namespace App\Livewire\Announcement;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Card extends Component
{
  public int $id;
  public string $title, $content, $author;
  public Carbon $created_at, $updated_at;
  public bool $isUnread = false;

  public function mount(): void
  {
    // sleep(1);
  }

  public function placeholder(): View
  {
    return view('livewire.announcement.skeleton');
  }

  public function render(): View
  {
    return view('livewire.announcement.card');
  }
}
