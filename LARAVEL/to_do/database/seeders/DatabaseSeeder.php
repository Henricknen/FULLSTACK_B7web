<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    
    public function run(): void {
        $this->call([       // chamando e passando um 'array' como os seeders que desejo rodar
            // UserSeeder::class,      // criará um usuário
        ]);

        User::factory(40)->create();        // criando usúarios aleatóriamente
        Category::factory(30)->create();     // chamando 'factory' da categoria para criar varias 'categories'
        Task::factory(100)->create();

    }
}
