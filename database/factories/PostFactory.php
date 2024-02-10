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
        $imgs = [
            "posts/1lOoA146xVUvabIbvSD2Cp2shDuvonwPRsifPsV3.jpg",
            "posts/hE0OkI5xN5s105QbQTdUKz3YRFEepSpClkdTiSFF.jpg",
            "posts/4S8QaiJ5CCHamjAzv1awJyj45cZ88hXgBVtKERTB.png"
        ];
        return [
            "image" => fake()->randomElement($imgs),
            "description" => fake()->sentence(),
            "slug" => fake()->regexify("[A-Za-z0-9]{10}"),
            // "user_id" => User::factory(),
        ];
    }
}
