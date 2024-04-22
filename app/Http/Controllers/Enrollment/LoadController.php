<?php

namespace App\Http\Controllers\Enrollment;

use App\Http\Controllers\Controller;

class LoadController extends Controller
{
  public function render()
  {
    return view('pages.main.enrollment.load');
  }
}