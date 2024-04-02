<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Role;
use Database\Factories\AnnouncementFactory;
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
    Announcement::factory()->count(7)->create();
  }
}
