<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProfileController extends Controller
{
  public function render(): View
  {
    return view('pages.main.profile.edit');
  }
}
