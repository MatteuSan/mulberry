<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
  public function renderEdit($id)
  {
    return view('pages.admin.announcements.edit', [
      'announcement' => Announcement::where('id', $id)->firstOrFail()
    ]);
  }

  public function render()
  {
    return view('pages.admin.announcements.index', [
      'announcements' => Announcement::all()
    ]);
  }
}
