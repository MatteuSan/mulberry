<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'name' => $this->faker->toUpper($this->faker->randomElement(['no', 'so', 'ea', 'we']) . $this->faker->numberBetween(100, 200)),
          'slug' => $this->faker->toLower($this->faker->randomElement(['no', 'so', 'ea', 'we']) . $this->faker->numberBetween(100, 200)),
        ];
    }
}
