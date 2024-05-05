<?php

namespace App\Livewire\Enrollment\Load;

use App\Models\Course;
use App\Models\Load;
use App\Models\LoadRequest;
use App\Models\Term;
use App\Traits\WithModifyLoad;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Section extends Component
{
  protected $loadedCourses;

  public function mount(): void
  {
    $this->loadedCourses = Course::orderBy('name')->get();
  }

  #[On('course-added')]
  #[On('course-removed')]
  #[On('request-opened')]
  #[On('request-closed')]
  public function update(): void
  {
    $this->loadedCourses = Course::orderBy('name')->get();
  }

  public function clear(): void
  {
    Load::where('student_id', auth()->user()->student->id)->delete();
    $this->redirect(route('enrollment.load'));
  }

  public function openRequest(): void
  {
    auth()->user()->student->loadRequest()->create([
      'term_id' => Term::orderBy('id', 'desc')->firstOrFail()->id,
    ]);
    $this->redirect(route('enrollment.load'));
  }

  public function closeRequest(): void
  {
    auth()->user()->student->loadRequest()->delete();
    $this->redirect(route('enrollment.load'));
  }

  public function render(): View
  {
    return view('components.livewire.enrollment.load.section', [
      'load' => $this->loadedCourses,
      'totalLoad' => function () {
        $units = [];
        foreach (Load::where('student_id', auth()->user()->student->id)->get() as $load) $units[] = $load->course->units;
        return array_sum($units);
      },
      'doesCourseExistInLoad' => fn (Course $course) => auth()->user()->student->loads()->where('course_id', $course->id)->exists(),
      'isRequestOpen' => LoadRequest::where('student_id', auth()->user()->student->id)->exists(),
      'isRequestApproved' => LoadRequest::where('student_id', auth()->user()->student->id)?->first()?->is_approved,
    ]);
  }
}
