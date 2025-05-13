<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Connexion>
 */
class connexionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'login' => fake()->text(),
            'date_heure' => fake()->dateTime(),
            'heure_de_verrouillage' => fake()->dateTime(),
            'etat' => fake()->text(),
            'tentatives_echouees' => fake()->numberBetween(0,5),
            'desactiver_compte' => fake()->boolean,
        ];
    }
}
