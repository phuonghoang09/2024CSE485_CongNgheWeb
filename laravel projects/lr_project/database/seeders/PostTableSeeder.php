<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Post;
use Illuminate\Support\Testing\Fakes\Fake;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Khởi tạo đối tượng Faker
        $faker = Faker::create();

        // Chạy vòng lặp xác định số bản ghi muốn sinh
        for ($i = 0; $i < 50; $i++) {
            Post::create([
                'title' => $faker->sentence(10, true),
                'body' => $faker->paragraph(3, true)
            ]);
        }
    }
}
