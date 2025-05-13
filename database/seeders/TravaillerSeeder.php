<?php

namespace Database\Seeders;

use App\Models\Travailler;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TravaillerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Travailler::factory(10)->create();
    }
}
