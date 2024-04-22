<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
  public function render(): View
  {
    return view('pages.main.profile.index', [
      'user' => auth()->user()
    ]);
  }
}
