<?php

namespace Database\Factories;

use App\Models\Entrepreneur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\achat_part>
 */
class achat_partFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Entrepreneur_id' => Entrepreneur::factory(),
            'nbr_parts' => fake()->numberBetween(0,100000),
            'montant_part' => fake()->numberBetween(0,100000),
            'date_achat_part' => fake()->date(),
        ];
    }
}