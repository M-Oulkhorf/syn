<?php

namespace Database\Factories;

use App\Models\Entite;
use App\Models\Entrepreneur;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\authentification>
 */
class authentificationFactory extends Factory
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
            'Utilisateur_id' => Utilisateur::factory(),
            'Entite_id' => Entite::factory()
        ];
    }
}
