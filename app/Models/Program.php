<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'slug',
    'description',
    'staff_id',
    'department_id'
  ];

  public function staff(): BelongsTo
  {
    return $this->belongsTo(Staff::class);
  }

  public function department(): BelongsTo
  {
    return $this->belongsTo(Department::class);
  }
}
