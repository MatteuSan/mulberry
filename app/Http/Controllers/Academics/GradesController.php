<?php

namespace App\Http\Controllers\Academics;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GradesController extends Controller
{
  public function render(): View
  {
    $courses = auth()->user()->grades()->pluck('course_id')->toArray();
    $gradedCourses = Course::whereIn('id', $courses)->get();
    return view('pages.main.academics.grades.index', [
      'grades' => auth()->user()->grades()->get(),
      'courses' => $gradedCourses,
    ]);
  }
}
