<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\LoadRequest;

class EnrollmentController extends Controller
{
  public function renderOnce(int $id)
  {
    return view('pages.admin.enrollment.id', [
      'loadRequest' => LoadRequest::where('id', $id)->firstOrFail(),
      'load' => Course::orderBy('name')->get()
    ]);
  }
}
