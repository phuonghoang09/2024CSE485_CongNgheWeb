<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ItCenter;

class HardwareDeviceFactory extends Factory
{
    protected $model = \App\Models\HardwareDevice::class;

    public function definition(): array
    {
        return [
            'device_name' => $this->faker->word . ' ' . $this->faker->randomNumber(3),
            'type' => $this->faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
            'status' => $this->faker->boolean,
            'center_id' => ItCenter::inRandomOrder()->first()?->id,
        ];
    }
}
