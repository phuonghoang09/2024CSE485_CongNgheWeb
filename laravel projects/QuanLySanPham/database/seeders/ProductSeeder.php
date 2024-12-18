<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Khởi tạo đối tượng Faker
        $faker = Faker::create();

        // Chạy vòng lặp xác định số bản ghi muốn sinh
        for ($i = 0; $i < 10; $i++) {
            $imagePath = $this->generateFakeImage(); // Tạo hình ảnh giả

            Product::create([
                'name' => $faker->words(3, true), // Tên sản phẩm ngẫu nhiên
                'description' => $faker->sentence(10), // Mô tả sản phẩm
                'price' => $faker->randomFloat(2, 10, 500), // Giá từ 10 đến 500
                'image' => $imagePath, // Đường dẫn hình ảnh
            ]);
        }
    }
    private function generateFakeImage()
    {
        $imageFiles = [
            '1.jpg',
            '2.jpg',
            '3.jpg', // Thêm tên file ảnh bạn đã lưu
            '4.jpg', // Thêm tên file ảnh bạn đã lưu
            '5.jpg', // Thêm tên file ảnh bạn đã lưu
            '6.jpg', // Thêm tên file ảnh bạn đã lưu
            '7.jpg', // Thêm tên file ảnh bạn đã lưu
            '8.jpg', // Thêm tên file ảnh bạn đã lưu
            '9.jpg', // Thêm tên file ảnh bạn đã lưu
            '10.jpg', // Thêm tên file ảnh bạn đã lưu
            '11.jpg', // Thêm tên file ảnh bạn đã lưu
            '12.jpg', // Thêm tên file ảnh bạn đã lưu
            '13.jpg', // Thêm tên file ảnh bạn đã lưu
            '14.jpg', // Thêm tên file ảnh bạn đã lưu
            '15.jpg', // Thêm tên file ảnh bạn đã lưu
            '16.jpg', // Thêm tên file ảnh bạn đã lưu
            '17.jpg', // Thêm tên file ảnh bạn đã lưu
        ];

        // Chọn ngẫu nhiên một file ảnh từ danh sách
        $randomImage = $imageFiles[array_rand($imageFiles)];

        // Copy file từ thư mục public/storage/products
        $destinationPath = 'products/' . uniqid() . '.jpg'; // Tạo tên file mới
        Storage::disk('public')->copy('products/' . $randomImage, $destinationPath);

        return $destinationPath;
    }
}
