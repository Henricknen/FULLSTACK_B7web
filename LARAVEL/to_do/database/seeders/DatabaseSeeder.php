<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this-> call([      // passando array com seeder que será rodaddo
            UserSeeder::class,
            CategorySeeder::class,
            TaskSeeder::class,
        ]);
    }
}
