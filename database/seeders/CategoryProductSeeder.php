<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 1; $i <= 3; $i++) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => fake()->name,
                    'description' => fake()->sentence,
                    'image' => null,
                    'unit_price' => fake()->randomFloat(2, 1, 1000),
                ]);
            }
        }
    }
}
