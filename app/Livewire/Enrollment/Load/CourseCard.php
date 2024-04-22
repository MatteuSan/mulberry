<?php

namespace App\Livewire\Enrollment\Load;

use App\Models\Load;
use Illuminate\View\View;
use Livewire\Component;

class CourseCard extends Component
{
  public int $id, $units;
  public string $title;
  public string $description;
  public bool $isLoaded = false;

  protected $matchedClassFromUnits;

  public function add(): void
  {
    Load::create([
      'student_id' => auth()->id(),
      'course_id' => $this->id,
    ]);
    $this->dispatch('course-added');
  }

  public function remove(): void
  {
    Load::where('student_id', auth()->id())
      ->where('course_id', $this->id)
      ->delete();
    $this->dispatch('course-removed');
  }

  public function render(): View
  {
    $this->matchedClassFromUnits = match ($this->units) {
      2 => 'surface',
      3 => 'accent',
      default => 'primary',
    };

    return view('components.livewire.enrollment.load.course-card', [
      'matchedClassFromUnits' => $this->matchedClassFromUnits,
    ]);
  }
}
