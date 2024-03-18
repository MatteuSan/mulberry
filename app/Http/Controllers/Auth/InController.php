<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InController extends Controller
{
  public function register_render()
  {
    return view('auth.register', [
      'users' => User::all(),
      'roles' => Role::all(),
    ]);
  }

  public function login_render()
  {
    return view('auth.login');
  }
}
