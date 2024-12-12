<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HardwareDevice;

class HardwareDeviceSeeder extends Seeder
{
    public function run(): void
    {
        HardwareDevice::factory(20)->create(); 
    }
}
