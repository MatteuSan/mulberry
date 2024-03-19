<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
