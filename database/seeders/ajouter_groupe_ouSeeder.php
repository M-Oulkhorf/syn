<?php

namespace Database\Seeders;

use App\Models\ou;
use App\Models\ajouter;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cadeau;

class ajouter_groupe_ouSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ajouter_groupe_ou::factory(10)->create();
    }
}
