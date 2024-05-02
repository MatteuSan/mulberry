<?php

namespace App\Livewire\Academics\Schedule;

use App\Models\LoadRequest;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Section extends Component
{
  public $schedules;

  public bool $isSubmitted = false;

  #[On('schedule-added')]
  #[On('schedule-removed')]
  public function mount(): void
  {
    $this->schedules = auth()->user()->schedules()->get();
  }

  public function lockIn(): void
  {
    if($this->schedules->count() > 0) {
      $this->dispatch('schedule-empty');
    }
    $this->isSubmitted = true;
  }

  public function render(): View
  {
    $isLoadApproved = LoadRequest::where('student_id', auth()->id())->where('is_approved', true)->exists();
    return view('components.livewire.academics.schedule.section', [
      'schedules' => $this->schedules,
      'isLoadApproved' => $isLoadApproved
    ]);
  }
}
