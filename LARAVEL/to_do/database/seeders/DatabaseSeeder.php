<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this-> call([      // passando array com seeder que será rodaddo
            UserSeeder::class,
            // CategorySeeder::class,
            // TaskSeeder::class,
        ]);

        Category::factory(50)-> create();        // chamando factory 'Category' e gerando 5 dados
        Task::factory(30)-> create();
    }
}
