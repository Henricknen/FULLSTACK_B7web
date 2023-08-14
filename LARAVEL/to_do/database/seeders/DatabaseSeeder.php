<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this-> call([      // passando array com seeder que será rodaddo
            // UserSeeder::class,
            // CategorySeeder::class,
            // TaskSeeder::class,
        ]);
            // ultilizando 'factory'
        User::factory(40)-> create();
        Category::factory(30)-> create();        // chamando factory 'Category' e gerando 30 categories
        Task::factory(100)-> create();
    }
}
