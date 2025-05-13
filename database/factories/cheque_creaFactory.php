<?php

namespace Database\Factories;

use App\Models\Contrat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cheque_crea>
 */
class cheque_creaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Contrat_id' => Contrat::factory(),
            'est_obtenu' => fake()->boolean(),
        ];
    }
}
