<?php

namespace Database\Factories;

use App\Models\type_contrat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contrat>
 */
class ContratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_Contrat_id' => type_contrat::factory(),
            'date_signature_contrat' => fake()->date(),
            'date_fin_contrat' => fake()->date(),
            'poste_contrat' => fake()->text(),
        ];
    }
}
