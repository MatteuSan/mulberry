<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Load extends Model
{
  use HasFactory;

  protected $fillable = [
    'student_id',
    'course_id',
  ];

  public function student(): HasOne
  {
    return $this->hasOne(Student::class, 'id', 'student_id');
  }

  public function course(): HasOne
  {
    return $this->hasOne(Course::class, 'id', 'course_id');
  }

  public function section(): HasOne
  {
    return $this->hasOne(Section::class, 'id', 'section_id');
  }
}
