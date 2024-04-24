<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoadRequest extends Model
{
  use HasFactory;

  protected $fillable = [
    'student_id',
    'term_id',
    'is_approved',
  ];
}
