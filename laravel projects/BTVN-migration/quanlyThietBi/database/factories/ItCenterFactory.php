<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItCenterFactory extends Factory
{
    protected $model = \App\Models\ItCenter::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company . ' Center',
            'location' => $this->faker->address,
            'contact_email' => $this->faker->unique()->safeEmail,
        ];
    }
}
