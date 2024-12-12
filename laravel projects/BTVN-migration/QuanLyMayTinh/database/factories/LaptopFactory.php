<?php

namespace Database\Factories;
use App\Models\Renter;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laptop>
 */
class LaptopFactory extends Factory
{
    protected $model = \App\Models\Laptop::class;

    public function definition(): array
    {
        return [
            'brand' => $this->faker->randomElement(['Dell', 'HP', 'Apple', 'Lenovo']),
            'model' => $this->faker->word . ' ' . $this->faker->randomNumber(4),
            'specifications' => $this->faker->sentence(10),
            'rental_status' => $this->faker->boolean,
            'renter_id' => Renter::inRandomOrder()->first()?->id, // Lấy ngẫu nhiên người thuê
        ];
    }
}
