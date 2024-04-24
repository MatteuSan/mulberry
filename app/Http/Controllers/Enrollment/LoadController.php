<?php

namespace App\Http\Controllers\Enrollment;

use App\Http\Controllers\Controller;
use App\Models\LoadRequest;

class LoadController extends Controller
{
  public function render()
  {
    return view('pages.main.enrollment.load', [
      'isRequestApproved' => LoadRequest::where('student_id', auth()->id())->first()?->is_approved,
    ]);
  }
}