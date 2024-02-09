<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ["Web Developer", "Backend Developer", "Mobile Developer", "Full Stack Developer", "Designer", "Other"][rand(0, 5)],
            'description' => fake()->sentence(),
        ];
    }
}
