<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
  use HasFactory;

  protected $fillable = [
    'number',
    'year',
    'program_id',
    'user_id',
    'batch',
    'load',
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }

  public function grades(): HasMany
  {
    return $this->hasMany(Grade::class, 'student_id', 'id');
  }

  public function loads(): HasMany
  {
    return $this->hasMany(Load::class, 'student_id', 'id');
  }

  public function schedules(): HasMany
  {
    return $this->hasMany(Schedule::class, 'student_id', 'id');
  }

  public function program(): BelongsTo
  {
    return $this->belongsTo(Program::class, 'program_id', 'id');
  }

  public function courses(): HasMany
  {
    return $this->hasMany(Course::class, 'student_id', 'id');
  }

  public function loadRequest(): HasOne
  {
    return $this->hasOne(LoadRequest::class, 'student_id', 'id');
  }

  public function takenCourses(): HasMany
  {
    return $this->hasMany(TakenCourse::class, 'student_id', 'id');
  }
}
