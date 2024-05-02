<?php

namespace App\Http\Controllers\Academics;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Course;

class MainController extends Controller
{
  public function render()
  {
    $announcements = Announcement::orderBy('updated_at', 'desc')->get()->filter(function ($announcement) {
      return $announcement->created_at->diffInMilliseconds() <= auth()->user()->created_at->diffInMilliseconds();
    });

    $courses = auth()->user()->grades()->pluck('course_id')->toArray();
    $gradedCourses = Course::whereIn('id', $courses)->get();

    return view('pages.main.academics.index', [
      'announcements' => $announcements,
      'announcements_read' => auth()->user()->readAnnouncements()->get(),
      'grades' => auth()->user()->grades()->get(),
      'gradedCourses' => $gradedCourses,
      'schedules' => auth()->user()->schedules()->get(),
    ]);
  }
}
