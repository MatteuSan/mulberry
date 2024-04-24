<?php

namespace App\Livewire\Enrollment\Load;

use App\Models\Course;
use Illuminate\View\View;
use Livewire\Component;

class LoadTable extends Component
{
  public $load;
  public bool $isRequestOpen = false;

  public function render(): View
  {
    return view('components.livewire.enrollment.load.load-table', [
      'doesCourseExistInLoad' => fn (Course $course) => auth()->user()->loadedCourses()->where('course_id', $course->id)->exists(),
    ]);
  }
}
