<?php

namespace Database\Seeders;

use App\Models\Groupe;
use App\Models\Groupe_ad;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupeADSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Groupe_ad::factory(10)->create();
    }
}
