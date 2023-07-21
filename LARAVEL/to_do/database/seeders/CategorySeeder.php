<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        
        Category::create([
            'title' => 'Categoria de exemplo 1',
            'color' => '#ff0000',
            'user_id' => 1
        ]);

        Category::create([
            'title' => 'Categoria de exemplo 2',
            'color' => '#ff00ff',
            'user_id' => 1
        ]);

        Category::create([
            'title' => 'Categoria de exemplo 3',
            'color' => '#ff00ff',
            'user_id' => 1
        ]);
    }
}
