<?php

namespace Database\Factories;

use App\Models\Groupe_ad;
use App\Models\ou;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ajouter_groupe_ou>
 */
class ajouter_groupe_ouFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ou_id' => ou::factory(),
            'groupe_ad_id' => Groupe_ad::factory(),
        ];
    }
}
