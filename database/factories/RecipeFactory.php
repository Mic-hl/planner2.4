<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText('20'),
            'ingredients' => [fake()->word(), fake()->word(), fake()->word(), fake()->word(), fake()->word()],
            'preparation' => fake()->realText('1000'),
            'difficulty' => fake()->randomElement(['easy', 'medium', 'hard']),
            'time' => fake()->numberBetween(10, 120),
            'user_id' => 1
        ];
    }
}
