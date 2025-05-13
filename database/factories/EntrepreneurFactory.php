<?php

namespace Database\Factories;

use App\Models\Accompagnant;
use App\Models\Cadeau;
use App\Models\dpt;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entrepreneur>
 */
class EntrepreneurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code_analytique_entrepreneur' => fake()->text(),
            'nom_entrepreneur' => fake()->name(),
            'prenom_entrepreneur' => fake()->name(),
            'sexe_entrepreneur' => fake()->text(),
            'date_naissance_entrepreneur' => fake()->date(),
            'lieu_naissance_entrepreneur' => fake()->text(),
            'nationalite_entrepreneur' => fake()->text(),
            'numero_ss_entrepreneur' => fake()->text(),
            'telephone1_entrepreneur' => fake()->text(),
            'telephone2_entrepreneur' => fake()->text(),
            'mail_entrepreneur' => fake()->text(),
            'demandeur_emploi' => fake()->boolean,
            'entrepreneur_actif' => fake()->boolean,
            'dpt_entree_id' => dpt::factory(),
            'dpt_actuel_id' => dpt::factory(),
            'Accompagnant_id' => Accompagnant::factory(),
            'date_fin_accompagnement' => fake()->date(),
            'matricule_silae' => fake() ->text(),
            'date_sortie' => fake() -> date(),
            'cadeau_id' => Cadeau::factory()
        ];
    }
}