<?php

namespace App\Livewire\Enrollment\Load;

use App\Models\Course;
use Illuminate\View\View;
use Livewire\Component;

class CourseRow extends Component
{
  public Course $course;

  public bool $isLoaded = false, $isActionDisabled = false;

  public function add(): void
  {
    auth()->user()->loadedCourses()->create(['course_id' => $this->course->id]);
    $this->dispatch('course-added');
  }

  public function remove(): void
  {
    auth()->user()->loadedCourses()->where('course_id', $this->course->id)->delete();
    $this->dispatch('course-removed');
  }

  public function render(): View
  {
    return view('components.livewire.enrollment.load.course-row');
  }
}
