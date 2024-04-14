<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'number' => rand(2015, 2024) . rand(1999, 2006) . rand(1, 12) . rand(1, 31) . $this->faker->unique()->numberBetween(10, 99),
      'role_id' => rand(1, 2),
      'department_id' => rand(1, 4)
    ];
  }
}
