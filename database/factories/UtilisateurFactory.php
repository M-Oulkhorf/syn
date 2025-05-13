<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilisateur>
 */
class UtilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_user' => fake()->name(),
            'prenom_user' => fake()->name(),
            'login_user' => fake()->text(),
            'adresse_mail_user' => fake()->text(),
            'valider_ad_user' => fake()->boolean,
            'modif_en_cours_user' => fake()->text(),
            'ancien_nom_user' => fake()->name(),
            'ancien_prenom_user' => fake()->name(),
            'ancien_login_user' => fake()->text(),
            'ancien_mail_user' => fake()->text(),
            'activer_user' => fake()->boolean,
        ];
    }
}