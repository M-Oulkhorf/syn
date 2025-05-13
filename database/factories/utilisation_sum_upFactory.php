<?php

namespace Database\Factories;

use App\Models\Activite;
use App\Models\boitier_sum_up;
use App\Models\Entrepreneur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\utilisation_sum_up>
 */
class utilisation_sum_upFactory extends Factory
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
            'Activite_id' => Activite::factory(),
            'boitier_sum_up_id' => boitier_sum_up::factory(),
        ];
    }
}
