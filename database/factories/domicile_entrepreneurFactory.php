<?php

namespace Database\Factories;

use App\Models\dpt;
use App\Models\Entrepreneur;
use App\Models\region;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\domicile_entrepreneur>
 */
class domicile_entrepreneurFactory extends Factory
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
            'rue_domicile_entrepreneur' => fake()->text(),
            'num_rue_domicile_entrepreneur' => fake()->numberBetween(0, 1000),
            'ville_domicile_entrepreneur' => fake()->text(),
            'cp_domicile_entrepreneur' => fake()->text(),
            'dpt_id' => dpt::factory(),
            'region_id' => region::factory()
        ];
    }
}
