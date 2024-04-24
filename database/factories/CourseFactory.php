<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'name' => $this->faker->company,
          'slug' => $this->faker->toUpper($this->faker->randomElement(['css', 'its', 'ged']) . $this->faker->numberBetween(100, 999) . $this->faker->randomElement(['l', ''])),
          'description' => $this->faker->realText(100),
          'units' => $this->faker->numberBetween(1, 3),
        ];
    }
}
