<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MangeUsersController extends Controller
{
  public function render(): View
  {
    return view('pages.admin.manage-users.index', [
      'users' => User::all(),
      'roles' => Role::all(),
    ]);
  }
}
