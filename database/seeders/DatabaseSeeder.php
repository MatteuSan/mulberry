<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Announcement;
use App\Models\Course;
use App\Models\Staff;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // Roles
    DB::table('roles')->insert([
      'title' => 'Superuser',
      'slug' => 'superuser',
      'permissions' => json_encode(['all']),
    ]);
    DB::table('roles')->insert([
      'title' => 'Staff',
      'slug' => 'staff',
      'permissions' => json_encode(['staff']),
    ]);
    DB::table('roles')->insert([
      'title' => 'Student',
      'slug' => 'student',
      'permissions' => json_encode(['student']),
    ]);

    // Terms
    DB::table('terms')->insert([
      'academic_year' => 2324,
      'term' => 1,
      'start_date' => '2024-02-27',
      'end_date' => '2024-05-13',
    ]);

    // Departments
    DB::table('departments')->insert([
      'title' => 'School of Information Technology',
      'slug' => 'soit',
    ]);
    DB::table('departments')->insert([
      'title' => 'Department of Physical Education and Athletics',
      'slug' => 'pe',
    ]);
    DB::table('departments')->insert([
      'title' => 'Department of Mathematics',
      'slug' => 'math',
    ]);
    DB::table('departments')->insert([
      'title' => 'Department of Physics',
      'slug' => 'p6',
    ]);

    // Programs
    DB::table('programs')->insert([
      'title' => 'Computer Science',
      'slug' => 'cs',
      'department_id' => 1,
    ]);
    DB::table('programs')->insert([
      'title' => 'Information Technology',
      'slug' => 'it',
      'department_id' => 1,
    ]);
    DB::table('programs')->insert([
      'title' => 'Data Science',
      'slug' => 'data-sci',
      'department_id' => 1,
    ]);
    DB::table('programs')->insert([
      'title' => 'Physics',
      'slug' => 'p6',
      'department_id' => 4,
    ]);
    DB::table('programs')->insert([
      'title' => 'Education in Mathematics',
      'slug' => 'math-educ',
      'department_id' => 3,
    ]);
    DB::table('programs')->insert([
      'title' => 'Human Kinetics',
      'slug' => 'hum-kinetics',
      'department_id' => 2,
    ]);
    DB::table('programs')->insert([
      'title' => 'Wellness Management',
      'slug' => 'well-man',
      'department_id' => 2,
    ]);

    // Users
    DB::table('users')->insert([
      'username' => 'matteu',
      'prefix' => 'Mr.',
      'first_name' => 'Matthew Gabriel',
      'middle_name' => 'Galang',
      'last_name' => 'Hernandez',
      'email' => 'matt@matteusan.com',
      'password' => Hash::make('testpassword'),
      'dob' => '2003-09-15',
      'role_id' => 1,
      'created_at' => Date::now(),
      'updated_at' => Date::now(),
    ]);
    DB::table('staff')->insert([
      'number' => 2022103367,
      'role_id' => 1,
      'user_id' => 1,
      'department_id' => 1,
      'created_at' => Date::now(),
      'updated_at' => Date::now(),
    ]);

    DB::table('users')->insert([
      'username' => 'matteu_student',
      'prefix' => 'Mr.',
      'first_name' => 'Matthew Gabriel',
      'middle_name' => 'Galang',
      'last_name' => 'Hernandez',
      'email' => 'student@matteusan.com',
      'password' => Hash::make('testpassword'),
      'dob' => '2003-09-15',
      'role_id' => 3,
      'created_at' => Date::now(),
      'updated_at' => Date::now(),
    ]);
    DB::table('students')->insert([
      'number' => 2022103368,
      'year' => 1,
      'user_id' => 2,
      'program_id' => 1,
      'batch' => 2022,
      'created_at' => Date::now(),
      'updated_at' => Date::now(),
    ]);

    DB::table('users')->insert([
      'username' => 'matteu_staff',
      'prefix' => 'Mr.',
      'first_name' => 'Matthew Gabriel',
      'middle_name' => 'Galang',
      'last_name' => 'Hernandez',
      'email' => 'staff@matteusan.com',
      'password' => Hash::make('testpassword'),
      'dob' => '2003-09-15',
      'role_id' => 2,
      'created_at' => Date::now(),
      'updated_at' => Date::now(),
    ]);
    DB::table('staff')->insert([
      'number' => 2022103369,
      'role_id' => 2,
      'user_id' => 3,
      'department_id' => 2,
      'created_at' => Date::now(),
      'updated_at' => Date::now(),
    ]);

    // Others
    User::factory(5)
      ->has(Staff::factory(1), 'staff')
      ->has(Announcement::factory(2), 'announcements')
      ->create();
    User::factory(5)
      ->has(
        Student::factory(1)->has(
          Grade::factory(5), 'grades'
        ), 'student'
      )
      ->create();
    // Announcement::factory(7)->create();
    Course::factory(24)->create();
    Section::factory(10)->create();
  }
}
