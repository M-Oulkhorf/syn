<?php

namespace Database\Seeders;

use App\Models\Cadeau;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CadeauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cadeau::factory(10)->create();
    }
}
