<?php

namespace App\Livewire\Academics\Schedule;

use App\Models\Course;
use App\Models\Schedule;
use App\Models\Section;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Row extends Component
{
  public bool $isEditable = false;
  public string $day;
  public string $timeframe;
  public int $scheduleId;
  public function delete(int $id): void
  {
    Schedule::where('id', $id)->delete();
    $this->dispatch('schedule-removed');
  }

  #[On('schedule-added')]
  #[On('schedule-removed')]
  public function render(): View
  {
    $doesScheduleExist = auth()->user()->schedules()->where('day', $this->day)->where('timeframe', $this->timeframe)->exists();
    $schedule = $doesScheduleExist ? auth()->user()->schedules()->where('day', $this->day)->where('timeframe', $this->timeframe)->first() : null;
    $course = $schedule ? Course::where('id', $schedule->course_id)->first()->slug : null;
    $section = $schedule ? Section::where('id', $schedule->section_id)->first()->name : null;
    $id = $schedule ? $schedule->id : null;

    return view('components.livewire.academics.schedule.row', [
      'doesScheduleExist' => $doesScheduleExist,
      'course' => $course,
      'section' => $section,
      'id' => $id
    ]);
  }
}
