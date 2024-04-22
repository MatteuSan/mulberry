<?php

namespace App\Livewire\Enrollment\Load;

use App\Models\Course;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class CoursesList extends Component
{
  protected $courses;

  public function mount(): void
  {
    $this->courses = Course::orderBy('name')->get()->filter(function ($course) {
      return !auth()->user()->loadedCourses()->where('course_id', $course->id)->exists();
    });
  }

  #[On('course-added')]
  #[On('course-removed')]
  public function update(): void
  {
    $this->courses = Course::orderBy('name')->get()->filter(function ($course) {
      return !auth()->user()->loadedCourses()->where('course_id', $course->id)->exists();
    });
  }

  public function render(): View
  {
    return view('components.livewire.enrollment.load.courses-list', [
      'courses' => $this->courses,
    ]);
  }
}
