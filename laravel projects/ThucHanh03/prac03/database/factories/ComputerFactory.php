<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computer>
 */
class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'computer_name' => $this->faker->unique()->word . '-' . $this->faker->bothify('Lab##-PC##'),
            'model' => $this->faker->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre M80s']),
            'operating_system' => $this->faker->randomElement(['Windows 10 Pro', 'Ubuntu 22.04', 'macOS Monterey']),
            'processor' => $this->faker->randomElement(['Intel Core i5-11400', 'AMD Ryzen 5 5600X', 'Intel Core i7-10700']),
            'memory' => $this->faker->randomElement([8, 16, 32, 64]), // RAM (GB)
            'available' => $this->faker->boolean(), // Trạng thái hoạt động
        ];
    }
}
