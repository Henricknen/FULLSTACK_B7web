<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    
    public function run(): void {

        $this-> call([       // chamando e passando um 'array' como os seeders que desejo rodar
            UserSeeder::class,      // criando um usuário
        ]);

        Category::factory(30)-> create();       // chamando 'factory' da categoria e gerando 50 categorias
        Task::factory(100)-> create();

        User::factory(4)-> create();        // criando 10 usúarios aleatóriamente

    }
}
