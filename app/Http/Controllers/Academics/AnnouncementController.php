<?php

namespace App\Http\Controllers\Academics;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\ReadAnnouncement;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
  public function render_once($id): View
  {
    if (!ReadAnnouncement::where('announcement_id', $id)->where('user_id', auth()->id())->exists()) {
      ReadAnnouncement::create([
        'announcement_id' => $id,
        'user_id' => auth()->id()
      ]);
    }
    return view('main.academics.announcements.id', [
      'announcement' => Announcement::where('id', $id)->firstOrFail()
    ]);
  }

  public function render(): View
  {
    return view('main.academics.announcements.index', [
      'announcements' => Announcement::orderBy('updated_at', 'desc')->get(),
      'announcements_read' => ReadAnnouncement::where('user_id', auth()->id())->get()
    ]);
  }
}
