<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'=>'Electronicos',
            'description'=>'Productos electronicos',
            'image'=>null,
        ]);

        for ($i=2; $i <=20 ; $i++) { 
            Category::create([
                'name'=>'Categoria '.$i,
                'description'=>'Productos de la categoria '.$i,
                'image'=>null,
            ]);
        }
    }
}
