<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Staff extends Model
{
  use HasFactory;

  protected $fillable = [
    'number',
    'role_id',
    'user_id',
    'courses',
    'department_id'
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function department(): BelongsTo
  {
    return $this->belongsTo(Department::class);
  }

  public function courses(): BelongsToMany
  {
    return $this->belongsToMany(Course::class);
  }

  public function announcements(): HasMany
  {
    return $this->hasMany(Announcement::class);
  }
}