<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cadeau>
 */
class CadeauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'donneur' => fake()->name(),
            'libelle_cadeau' => fake()->text(),
            'stock_cadeau' => fake()->numberBetween(0, 1000),
        ];
    }
}