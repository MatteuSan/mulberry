<?php

namespace App\Http\Controllers\Academics;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\ReadAnnouncement;
use App\Models\User;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
  public function renderOnce($id): View
  {
    if (!auth()->user()->readAnnouncements()->where('announcement_id', $id)->exists()) {
      ReadAnnouncement::create([
        'announcement_id' => $id,
        'user_id' => auth()->id()
      ]);
    }

    $announcement = Announcement::where('id', $id)->firstOrFail();

    return view('pages.main.academics.announcements.id', [
      'announcement' => $announcement,
      'author' => $announcement->user()->firstOrFail(),
    ]);
  }

  public function render(): View
  {
    $announcements = Announcement::orderBy('updated_at', 'desc')->get()->filter(function ($announcement) {
      return $announcement->created_at->diffInMilliseconds() <= auth()->user()->created_at->diffInMilliseconds();
    });

    return view('pages.main.academics.announcements.index', [
      'announcements' => $announcements,
      'announcements_read' => auth()->user()->readAnnouncements()->get(),
    ]);
  }
}
