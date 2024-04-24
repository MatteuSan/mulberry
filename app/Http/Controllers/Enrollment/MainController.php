<?php

namespace App\Http\Controllers\Enrollment;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Load;
use App\Models\LoadRequest;
use App\Models\Student;
use App\Models\Term;
use Illuminate\Http\Request;

class MainController extends Controller
{
  public function render()
  {
    return view('pages.main.enrollment.index', [
      'load' => Course::orderBy('name')->get()->filter(fn (Course $course) => auth()->user()->loadedCourses()->where('course_id', $course->id)->exists()),
      'totalLoad' => function (int $studentId) {
        $units = [];
        foreach (Load::where('student_id', $studentId)->get() as $load) $units[] = $load->course->units;
        return array_sum($units);
      },
      'studentNumber' => fn (int $studentId) => Student::where('id', $studentId)->firstOrFail()->number,
      'term' => fn (int $termId) => Term::where('id', $termId)->firstOrFail()->term . "Q" . Term::where('id', $termId)->firstOrFail()->academic_year . "Y",
      'isRequestApproved' => LoadRequest::where('student_id', auth()->id())?->first()?->is_approved,
      'pendingLoadRequests' => LoadRequest::where('is_approved', false)->get(),
      'approvedLoadRequests' => LoadRequest::where('is_approved', true)->get(),
    ]);
  }
}
