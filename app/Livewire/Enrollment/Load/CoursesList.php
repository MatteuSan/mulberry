<?php

namespace App\Livewire\Enrollment\Load;

use App\Models\Course;
use App\Models\LoadRequest;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CoursesList extends Component
{
  use WithPagination, WithoutUrlPagination;

  protected $courses;

  public function mount(): void
  {
    $this->courses = Course::orderBy('name')->paginate(6);
  }

  #[On('course-added')]
  #[On('course-removed')]
  public function update(): void
  {
    $this->courses = Course::orderBy('name')->paginate(6);
  }

  public function render(): View
  {
    $this->courses = Course::orderBy('name')->paginate(6);

    return view('components.livewire.enrollment.load.courses-list', [
      'courses' => $this->courses,
      'doesCourseNotExist' => fn (Course $course) => !auth()->user()->student->loads()->where('course_id', $course->id)->exists(),
      'isRequestApproved' => LoadRequest::where('student_id', auth()->user()->student->id)->first()?->is_approved,
      'isRequestOpen' => LoadRequest::where('student_id', auth()->user()->student->id)->exists()
    ]);
  }
}
