<?php

namespace Database\Seeders;
use App\Models\Renter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Renter::factory(10)->create(); 
    }
}
