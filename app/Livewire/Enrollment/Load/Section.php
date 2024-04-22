<?php

namespace App\Livewire\Enrollment\Load;

use App\Models\Course;
use App\Models\Load;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Section extends Component
{
  protected $loadedCourses;

  public function mount(): void
  {
    $this->loadedCourses = Course::orderBy('name')->get()->filter(function ($course) {
      return auth()->user()->loadedCourses()->where('course_id', $course->id)->exists();
    });
  }

  #[On('course-added')]
  #[On('course-removed')]
  public function update(): void
  {
    $this->loadedCourses = Course::orderBy('name')->get()->filter(function ($course) {
      return auth()->user()->loadedCourses()->where('course_id', $course->id)->exists();
    });
  }

  public function render(): View
  {
    return view('components.livewire.enrollment.load.section', [
      'load' => $this->loadedCourses,
    ]);
  }
}
