<?php

namespace Database\Factories;

use App\Models\Entrepreneur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\visite_medicale>
 */
class visite_medicaleFactory extends Factory
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
            'date_visite' => fake()->date(),
            'resultat_visite' => fake()->text(),
            'date_prochaine_visite' => fake()->date(),
        ];
    }
}
