<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            'title' => fake()->sentence(),
            'content' => fake()->paragraphs(3, true),
            'thumbnail' => 'defaults/default_thumbnail.png',
            'visibility' => fake()->randomElement(['public', 'private']),
            'scheduled_at' => fake()->optional(0.3)->dateTimeBetween('+5 minutes', '+1 hour')
        ];
    }
}
