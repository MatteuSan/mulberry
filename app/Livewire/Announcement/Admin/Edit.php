<?php

namespace App\Livewire\Announcement\Admin;

use App\Models\Announcement;
use App\Models\ReadAnnouncement;
use Livewire\Component;

class Edit extends Component
{
  public Announcement $announcement;
  public string $title;
  public string $content;

  public function edit(): void
  {
    $this->validate([
      'title' => 'required',
      'content' => 'required'
    ]);

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
    return view('livewire.announcement.admin.edit');
  }
}
