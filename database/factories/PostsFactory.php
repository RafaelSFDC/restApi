<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'likes' => fake()->numberBetween(0, 100),
            'user_id' => User::factory()->create()->id,
            'category_id' => fake()->numberBetween(1, 6),
        ];
    }
}
