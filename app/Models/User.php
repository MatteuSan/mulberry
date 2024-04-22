<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasFactory;

  protected $fillable = [
    'username',
    'prefix',
    'first_name',
    'middle_name',
    'last_name',
    'suffix',
    'email',
    'password',
    'dob',
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

  public function fullName(bool $hasMiddle = false, bool $hasPrefix = false, bool $hasSuffix = false): string {
    $prefix = $hasPrefix ? $this->prefix . ' ' : '';
    $middleName = $hasMiddle ? $this->middle_name : '';
    $suffix = $hasSuffix ? ' ' . $this->suffix : '';
    return "$prefix$this->first_name $middleName $this->last_name$suffix";
  }

  public function announcements(): HasMany
  {
    return $this->hasMany(Announcement::class);
  }

  public function readAnnouncements(): HasMany
  {
    return $this->hasMany(ReadAnnouncement::class, 'user_id', 'id');
  }

  public function role(): HasOne
  {
    return $this->hasOne(Role::class, 'id', 'role_id');
  }

  public function loadedCourses(): HasMany
  {
    return $this->hasMany(Load::class, 'student_id', 'id');
  }

  public function student(): HasOne
  {
    return $this->hasOne(Student::class, 'user_id', 'id');
  }

  public function staff(): HasOne
  {
    return $this->hasOne(Staff::class, 'user_id', 'id');
  }

  public function isStudent(): bool
  {
    return $this->role->slug === 'student';
  }

  public function isStaff(): bool
  {
    return $this->role->slug === 'staff';
  }

  public function isSuperuser(): bool
  {
    return $this->role->slug === 'superuser';
  }
}
