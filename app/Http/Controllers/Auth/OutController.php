<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class OutController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function logout()
    {
      auth()->logout();
      return redirect()->route('home');
    }
}
