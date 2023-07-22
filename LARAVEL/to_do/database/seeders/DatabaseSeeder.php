<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    
    public function run(): void {
        $this->call([       // chamando e passando um 'array' como os seeders que desejo rodar
            UserSeeder::class,      // criará um usuário
        ]);

        Category::factory(5)->create();     // chamando 'factory' da categoria para criar uma com 50 'categories'
        Task::factory(30)->create();

    }
}
