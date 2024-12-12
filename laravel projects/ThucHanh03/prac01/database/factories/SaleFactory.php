<?php

namespace Database\Factories;
use App\Models\Medicine;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'medicine_id' => Medicine::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'sale_date' => $this->faker->dateTimeBetween('-1 year'),
            'customer_phone' => $this->faker->phoneNumber(),
        ];
    }
}
