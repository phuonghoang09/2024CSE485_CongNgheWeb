<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItCenter;

class ItCenterSeeder extends Seeder
{
    public function run(): void
    {
        ItCenter::factory(10)->create(); 
    }
}
