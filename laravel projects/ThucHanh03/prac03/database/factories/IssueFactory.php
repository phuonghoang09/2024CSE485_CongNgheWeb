<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Computer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'computer_id' => Computer::factory(), // Tự động liên kết với Computer
            'reported_by' => $this->faker->name(), // Tên người báo cáo
            'reported_date' => $this->faker->dateTimeBetween('-1 year', 'now'), // Ngày báo cáo
            'description' => $this->faker->paragraph(), // Mô tả vấn đề
            'urgency' => $this->faker->randomElement(['Low', 'Medium', 'High']), // Mức độ sự cố
            'status' => $this->faker->randomElement(['Open', 'In Progress', 'Resolved']), // Trạng thái
        ];
    }
}
