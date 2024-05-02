<?php

namespace App\Livewire\Academics\Schedule;

use App\Models\LoadRequest;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Table extends Component
{
  public bool $isEditable = false;
  public bool $isMinimized = false;

  public function render(): View
  {
    $isLoadApproved = LoadRequest::where('student_id', auth()->id())->where('is_approved', true)->exists();
    return view('components.livewire.academics.schedule.table', [
      'isLoadApproved' => $isLoadApproved
    ]);
  }
}
