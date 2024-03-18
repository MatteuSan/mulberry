<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
  public function editRender($id)
  {
    return view('admin.announcements.edit', [
      'announcement' => Announcement::where('id', $id)->get()[0]
    ]);
  }

  public function render()
  {
    return view('admin.announcements.index', [
      'announcements' => Announcement::all()
    ]);
  }
}
