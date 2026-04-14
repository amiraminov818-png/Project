<?php

namespace Database\Factories;


use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends Factory<Post>
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
            'title' => fake()->sentence(5),
            'content' => fake()->paragraph(),
            'is_published' => fake()->boolean(),
            'is_active' => fake()->boolean(),
            'user_id' => User::query()->inRandomOrder()->first()->id ?? User::factory(),

        ];
    }
}
