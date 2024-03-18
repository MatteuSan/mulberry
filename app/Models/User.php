<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $fillable = [
    'username',
    'title',
    'first_name',
    'middle_name',
    'last_name',
    'suffix',
    'email',
    'password',
    'role_id',
  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  public function isStudent(): bool
  {
    // Superuser = 1
    // Staff = 2
    // Student = 3
    return $this->role_id === 3;
  }

  public function isStaff(): bool
  {
    return $this->role_id === 2;
  }

  public function isSuperuser(): bool
  {
    return $this->role_id === 1;
  }
}
