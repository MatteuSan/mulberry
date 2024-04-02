<?php

namespace App\Livewire\Admin\Announcement;

use App\Models\Announcement;
use App\Models\ReadAnnouncement;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
  public Announcement $announcement;

  #[Validate('string|required')]
  public string $title;

  #[Validate('string|required')]
  public string $content;

  public function edit(): void
  {
    $this->validate();
    $announcement = Announcement::find($this->announcement->id);
    $announcement->title = $this->title;
    $announcement->content = $this->content;
    $announcement->save();

    $readAnnouncement = ReadAnnouncement::where('announcement_id', $this->announcement->id)->get();
    foreach ($readAnnouncement as $read) $read->delete();

    redirect(route('admin.announcements'));
  }

  public function delete(): void
  {
    Announcement::destroy($this->announcement->id);
    redirect(route('admin.announcements'));
  }

  public function render()
  {
    return view('components.livewire.admin.announcement.edit');
  }
}
