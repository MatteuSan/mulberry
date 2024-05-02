<?php

namespace App\Livewire\Academics\Schedule;

use App\Models\Course;
use App\Models\Schedule;
use App\Models\Section;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
  #[Validate('required|integer')]
  public int $courseId;
  #[Validate('required|string')]
  public string $day;
  #[Validate('required|string')]
  public string $timeframe;

  public string $actionType;

  public $days = [
    'monday',
    'tuesday',
    'wednesday',
    'thursday',
    'friday',
    'saturday',
    'sunday',
  ];

  public $timeframes = [
    '7:30 AM - 9:00 AM',
    '9:00 AM - 10:30 AM',
    '10:30 AM - 12:00 PM',
    '12:00 PM - 1:30 PM',
    '1:30 PM - 3:00 PM',
    '3:00 PM - 4:30 PM',
    '4:30 PM - 6:00 PM',
    '6:00 PM - 7:30 PM',
    '7:30 PM - 9:00 PM',
  ];

  private function isColliding(string $day, string $timeframe): bool
  {
    return auth()->user()->schedules()->where('day', $day)->where('timeframe', $timeframe)->exists();
  }

  public function mount(): void
  {
    $this->courseId = auth()->user()->loadedCourses()->pluck('course_id')->first();
    $this->day = $this->days[0];
    $this->timeframe = $this->timeframes[0];
  }

  public function add(): void
  {
    $this->validate();

    Schedule::create([
      'student_id' => auth()->id(),
      'course_id' => $this->courseId,
      'section_id' => auth()->user()->loadedCourses()->where('course_id', $this->courseId)->firstOrFail()->section_id,
      'day' => $this->day,
      'timeframe' => $this->timeframe,
      'term_id' => 1,
    ]);

    $this->day = $this->isColliding($this->day, $this->timeframe) ? $this->days[array_search($this->day, $this->days) + 1] ?: $this->day : $this->day;
    $this->timeframe = $this->isColliding($this->day, $this->timeframe) ? $this->timeframes[array_search($this->timeframe, $this->timeframes) + 1] ?: $this->timeframe : $this->timeframe;

    $this->dispatch('schedule-added');
  }

  public function render(): View
  {
    $loadedCourses = auth()->user()->loadedCourses()->pluck('course_id')->toArray();
    $loads = Course::whereIn('id', $loadedCourses)->get();
    return view('components.livewire.academics.schedule.form', [
      'loads' => $loads,
      'timeframes' => $this->timeframes,
      'isColliding' => fn($day, $timeframe) => $this->isColliding($day, $timeframe),
      'sections' => Section::all()
    ]);
  }
}
