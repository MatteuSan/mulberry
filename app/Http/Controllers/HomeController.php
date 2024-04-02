<?php

namespace App\Http\Controllers;

use App\Models\Announcement;

class HomeController extends Controller
{
  public static function readAll()
  {
    auth()->user()->readAnnouncements()->createMany(
      Announcement::all()->filter(function ($announcement) {
        return $announcement->created_at->diffInMilliseconds() <= auth()->user()->created_at->diffInMilliseconds();
      })->filter(function ($announcement) {
        return !auth()->user()->readAnnouncements()->where('announcement_id', $announcement->id)->exists();
      })->map(function ($announcement) {
        return ['announcement_id' => $announcement->id];
      })->toArray()
    );
  }
  public function render()
  {
    $announcements = Announcement::orderBy('updated_at', 'desc')->get()->filter(function ($announcement) {
      return $announcement->created_at->diffInMilliseconds() <= auth()->user()->created_at->diffInMilliseconds();
    })->filter(function ($announcement) {
      return !auth()->user()->readAnnouncements()->where('announcement_id', $announcement->id)->exists();
    });

    $announcements_all = Announcement::orderBy('updated_at', 'desc')->get()->filter(function ($announcement) {
      return $announcement->created_at->diffInMilliseconds() <= auth()->user()->created_at->diffInMilliseconds();
    });

    return view('pages.main.index', [
      'announcements' => $announcements->take(2),
      'announcements_all' => $announcements_all,
      'announcements_read' => auth()->user()->readAnnouncements()->get(),
      'pluralize' => fn(string $baseWord, string $pluralWord, int $count) => $count === 1 ? $baseWord : $pluralWord
    ]);
  }
}
