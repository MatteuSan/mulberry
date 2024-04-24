<?php

namespace App\Livewire\Enrollment\Load;

use App\Models\Course;
use App\Models\Load;
use Illuminate\View\View;
use Livewire\Component;

class LoadTable extends Component
{
  public $load;
  public bool $isRequestOpen = false;
  public int|null $id = null;

  public function render(): View
  {
    return view('components.livewire.enrollment.load.load-table', [
      'doesCourseExistInLoad' => fn (Course $course) => $this->id ? Load::where('course_id', $course->id)->where('student_id', $this->id)->exists() : auth()->user()->loadedCourses()->where('course_id', $course->id)->exists(),
    ]);
  }
}
