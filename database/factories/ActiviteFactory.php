<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activite>
 */
class ActiviteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_activite' => fake()->text(),
            'lien_boutique_en_ligne' => fake()->text(),
            'description_activite' => fake()->text(),
            'rcpro_activite' => fake()->text(),
            'marge_salaire_activite' => fake()->randomFloat(2, 0, 1000000),
            'salaire_activite' => fake()->randomFloat(2, 0, 1000000),
            'nom_commercial' => fake()->text(),
            'mot_cle_activite' => fake()->text(),
            'necessite_stock' => $this->faker->boolean(),
            'date_dernier_etat_stock' => $this->faker->boolean() ? $this->faker->date() : null,
        ];
    }
}