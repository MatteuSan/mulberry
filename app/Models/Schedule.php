<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'timeframe',
        'day',
        'room',
        'building',
        'staff_id',
        'section_id'
    ];

  public function student(): BelongsTo
  {
    return $this->belongsTo(Student::class);
  }

  public function staff(): BelongsTo
  {
    return $this->belongsTo(Staff::class);
  }

  public function course(): BelongsTo
  {
    return $this->belongsTo(Course::class);
  }

  public function section(): BelongsTo
  {
    return $this->belongsTo(Section::class);
  }
}
