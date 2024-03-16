<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'year',
        'program_id',
        'role_id',
        'user_id',
        'load',
        'grade_id'
    ];
}