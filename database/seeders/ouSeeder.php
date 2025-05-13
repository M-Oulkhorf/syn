<?php

namespace Database\Seeders;

use App\Models\ou;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ouSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ou::factory(10)->create();
    }
}
