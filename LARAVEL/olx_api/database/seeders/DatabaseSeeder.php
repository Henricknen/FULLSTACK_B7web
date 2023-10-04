<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this-> call([
            StatesSeeder::class,        // chamando o 'StatesSeeder'
            CategoriesSeeder::class         // chamando o 'CategoriesSeeder'
        ]);
    }
}
