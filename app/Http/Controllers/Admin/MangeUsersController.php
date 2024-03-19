<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class MangeUsersController extends Controller
{
  public function render()
  {
    return view('admin.manage-users.register', [
      'users' => User::all(),
      'roles' => Role::all(),
    ]);
  }
}
