<?php

namespace App\Http\Controllers\Academics;

use App\Http\Controllers\Controller;
use App\Models\LoadRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScheduleController extends Controller
{
  // TODO: Implement after form is done
  public function renderScheduleIfItExists(string $day, string $timeframe)
  {
    //
  }

  public function render(): View
  {
    $isLoadApproved = LoadRequest::where('student_id', auth()->id())->where('is_approved', true)->exists();
    return view('pages.main.academics.schedule.index', [
      'isLoadApproved' => $isLoadApproved
    ]);
  }
}
