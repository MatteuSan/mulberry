<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InController extends Controller
{

  public function __construct()
  {
    $this->middleware(['guest', 'student']);
  }

  public function register(Request $request): RedirectResponse
  {
    $this->validate($request, [
      'name' => 'required|string',
      'email' => 'required|email|unique:users',
      'password' => 'required',
      'role_id' => 'required|exists:roles,id',
    ]);

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password, ['rounds' => 12]),
      'role_id' => $request->role_id,
    ]);

    auth()->attempt($request->only('email', 'password'));
    return redirect()->route('home');
  }

  public function login(Request $request): RedirectResponse
  {
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if (!auth()->attempt($request->only('email', 'password'))) {
      return back()->with('status', 'Invalid login details');
    }

    return redirect()->route('home');
  }

  public function register_render()
  {
    return view('auth.register');
  }

  public function login_render()
  {
    return view('auth.login');
  }
}
