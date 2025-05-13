<?php

namespace Database\Factories;

use App\Models\dpt;
use App\Models\Entite;
use App\Models\region;
use App\Models\Contrat;
use App\Models\Activite;
use App\Models\Entrepreneur;
use App\Models\visite_medicale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travailler>
 */
class TravaillerFactory extends Factory
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
            'Entite_id' => Entite::factory(),
            'Contrat_id' => Contrat::factory(),
            'Activite_id' => Activite::factory(),
            'visite_medicale_id' => visite_medicale::factory(),
            'dpt_id' => dpt::factory(),
            'region_id' => region::factory(),
            'date_access_societariat' => fake()->date(),
            'adhesion_en_cours' => fake()->boolean(),
            'fiche_site' => fake()->boolean(),
        ];
    }
}
