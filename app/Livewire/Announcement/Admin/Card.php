<?php

namespace App\Livewire\Announcement\Admin;

use App\Models\Announcement;
use Illuminate\Support\Carbon;
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

  public function create(): void
  {
    Announcement::create([
      'title' => $this->title,
      'content' => $this->content
    ]);
    $this->dispatch('announcements-admin-updated');
  }

  public function delete(): void
  {
    Announcement::destroy($this->id);
    $this->dispatch('announcements-admin-updated');
  }

  public function render()
  {
    return view('livewire.announcement.admin.card');
  }
}
