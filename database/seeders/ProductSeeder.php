<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id'=>1,
            'name'=>'Laptop',
            'description'=>'A laptop computer.',
            'image'=>null,
            'unit_price'=>500,
        ]);

        Product::create([
            'category_id'=>1,
            'name'=>'Celular | Teléfono Movil',
            'description'=>'Un teléfono móvil.',
            'image'=>null,
            'unit_price'=>300,
        ]);
    }
}
