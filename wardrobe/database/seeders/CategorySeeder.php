<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Tops',
            'Bottoms',
            'Dresses',
            'Outerwear',
            'Shoes',
            'Accessories',
            'Underwear',
            'Sleepwear',
            'Activewear',
            'Formal Wear',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}