<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\ReadAnnouncement;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
  public function render()
  {
    $announcements = Announcement::orderBy('updated_at', 'desc')->get()->filter(function ($announcement) {
      return !ReadAnnouncement::where('announcement_id', $announcement->id)->where('user_id', auth()->user()->id)->exists();
    });

    return view('main.home', [
      'announcements' => $announcements,
      'announcements_all' => Announcement::all(),
      'announcements_read' => ReadAnnouncement::where('user_id', auth()->user()->id)->get(),
      'pluralize' => fn(string $baseWord, string $pluralWord, int $count) => $count === 1 ? $baseWord : $pluralWord
    ]);
  }
}
