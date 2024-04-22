<?php

namespace App\Http\Controllers\Academics;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Grade;
use App\Models\ReadAnnouncement;
use Illuminate\Http\Request;

class MainController extends Controller
{
  public function render()
  {
    $announcements = Announcement::orderBy('updated_at', 'desc')->get()->filter(function ($announcement) {
      return $announcement->created_at->diffInMilliseconds() <= auth()->user()->created_at->diffInMilliseconds();
    });

    return view('pages.main.academics.index', [
      'announcements' => $announcements,
      'announcements_read' => auth()->user()->readAnnouncements()->get(),
      'grades' => Grade::with('user')->orderBy('created_at', 'desc')->first()
    ]);
  }
}
