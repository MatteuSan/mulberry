<?php

namespace App\Http\Controllers\Enrollment;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\LoadRequest;
use Illuminate\Http\Request;

class MainController extends Controller
{
  public function render()
  {
    return view('pages.main.enrollment.index', [
      'load' => Course::orderBy('name')->get()->filter(fn (Course $course) => auth()->user()->loadedCourses()->where('course_id', $course->id)->exists()),
      'isRequestApproved' => LoadRequest::where('student_id', auth()->id())?->first()?->is_approved,
    ]);
  }
}
