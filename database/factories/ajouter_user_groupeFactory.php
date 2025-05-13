<?php

namespace Database\Factories;

use App\Models\Groupe_ad;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ajouter_user_groupe>
 */
class ajouter_user_groupeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'groupe_ad_id' => Groupe_ad::factory(),
            'utilisateur_id' => Utilisateur::factory(),
        ];
    }
}
