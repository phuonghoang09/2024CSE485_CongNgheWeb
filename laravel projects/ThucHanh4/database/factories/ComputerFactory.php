<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computer>
 */
class ComputerFactory extends Factory
{
    protected $model = \app\Models\Computer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'computer_name' => $this->faker->bothify('Lab#-PC##'),
            'model' => $this->faker->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre M90']),
            'operating_system' => $this->faker->randomElement(['Windows 10 Pro', 'Ubuntu 20.04', 'macOS Ventura']),
            'processor' => $this->faker->randomElement(['Intel Core i5-11400', 'AMD Ryzen 5 4600G', 'Intel Core i7-9700']),
            'memory' => $this->faker->randomElement([8, 16, 32]),
            'available' => $this->faker->boolean(80), // 80% là true
        ];
    }
}
