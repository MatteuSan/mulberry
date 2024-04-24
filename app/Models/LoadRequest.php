<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoadRequest extends Model
{
  use HasFactory;

  protected $fillable = [
    'student_id',
    'term_id',
    'is_approved',
  ];

  public function student(): BelongsTo
  {
    return $this->belongsTo(User::class, 'id', 'student_id');
  }

  public function term(): BelongsTo
  {
    return $this->belongsTo(Term::class, 'id', 'term_id');
  }
}
