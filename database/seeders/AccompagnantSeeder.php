<?php

namespace Database\Seeders;

use Database\Factories\AccompagnantFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccompagnantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccompagnantFactory::new()->count(10)->create();
    }
}
