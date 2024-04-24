<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'student_id' => $this->faker->randomDigitNot(0),
          'course_id' => $this->faker->randomDigitNot(0),
          'score' => $this->faker->randomFloat(2, 0, 100),
          'grade' => $this->faker->randomFloat(min: 1, max: 5),
          'completion_grade' => $this->faker->randomElement(['P', 'F']),
        ];
    }
}
