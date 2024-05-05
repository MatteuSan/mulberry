<?php

namespace App\Livewire\Enrollment\Load;

use App\Models\Load;
use App\Models\Section;
use App\Models\Course;
use Illuminate\View\View;
use Livewire\Component;

class CourseRow extends Component
{
  public Course $course;
  public bool $isLoaded = false,
              $isActionDisabled = false,
              $isSectionDisabled = true,
              $isSectionVisible = false;
  public int|null $sectionId, $userId = null;

  public function mount(): void
  {
    $this->sectionId = $this->userId ? Load::where('student_id', $this->userId)?->where('course_id', $this->course->id)?->first()?->section_id : auth()->user()->student->loads()->where('course_id', $this->course->id)?->first()?->section_id;
  }

  public function add(): void
  {
    Load::create([
      'student_id' => auth()->user()->student->id,
      'course_id' => $this->course->id,
      'section_id' => $this->sectionId,
    ]);
    $this->dispatch('course-added');
  }

  public function remove(): void
  {
    auth()->user()->student->loads()->where('course_id', $this->course->id)->delete();
    $this->dispatch('course-removed');
  }

  public function updateSection(): void
  {
    $load = auth()->user()->student->loads()->where('course_id', $this->course->id)?->first();
    $load->section_id = $this->sectionId;
    $load->save();
    $this->dispatch('course-added');
  }

  public function render(): View
  {
    return view('components.livewire.enrollment.load.course-row', [
      'sections' => Section::all()
    ]);
  }
}
