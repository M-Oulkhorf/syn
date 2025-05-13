<?php

namespace Database\Seeders;

use App\Models\Entrepreneur;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EntrepreneurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entrepreneur::factory(10)->create();
    }
}
