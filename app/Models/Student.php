<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
  use HasFactory;

  protected $fillable = [
    'number',
    'year',
    'program_id',
    'user_id',
    'load',
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function grades(): HasMany
  {
    return $this->hasMany(Grade::class);
  }

  public function loads(): HasMany
  {
    return $this->hasMany(Load::class);
  }

  public function schedule(): HasMany
  {
    return $this->hasMany(Schedule::class);
  }

  public function program(): BelongsTo
  {
    return $this->belongsTo(Program::class);
  }

  public function courses(): HasMany
  {
    return $this->hasMany(Course::class);
  }
}
