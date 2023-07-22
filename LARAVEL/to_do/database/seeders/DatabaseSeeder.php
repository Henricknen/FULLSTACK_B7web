<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this->call([       // chamando e passando um 'array' como os seeders que desejo rodar
            UserSeeder::class,      // criará um usuário
            // TaskSeeder::class,
        ]);

        Category::factory(5)->create();     // chamando 'factory' da categoria para criar uma com 5 dados


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
