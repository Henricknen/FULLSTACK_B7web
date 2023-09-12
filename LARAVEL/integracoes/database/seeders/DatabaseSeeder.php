<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run() {        
        DB::table('units')->insert([
            'name' => 'Apartamento 100',
            'id_owner' => 1,
        ]);

        DB::table('units')->insert([
            'name' => 'Apartamento 101',
            'id_owner' => 1,
        ]);

        DB::table('units')->insert([
            'name' => 'Apartamento 300',
            'id_owner' => 0,
        ]);

        DB::table('units')->insert([
            'name' => 'Apartamento 250',
            'id_owner' => 0,
        ]);

        DB::table('areas')->insert([
            'allowed' => 1,
            'title' => 'Academia',
            'cover' => 'gym.jpg',
            'days' => '1, 2, 3, 4',
            'start_time' => '06:00:00',
            'end_time' => '22:00:00',
        ]);

        DB::table('areas')->insert([
            'allowed' => 1,
            'title' => 'Piscina',
            'cover' => 'pool.jpg',
            'days' => '1, 2, 3, 4, 5',
            'start_time' => '07:00:00',
            'end_time' => '23:00:00',
        ]);

        DB::table('areas')->insert([
            'allowed' => 1,
            'cover' => 'barbecue.jpg',
            'title' => 'Churrasqueira',
            'days' => '4, 5, 6',
            'start_time' => '09:00:00',
            'end_time' => '23:00:00',
        ]);

        DB::table('walls')->insert([
            'title' => 'Título de aviso',
            'body' => 'saffdsdsghgfjhj hkghkgkg jjllklkhlkl',
            'datecreated' => '2023-09-11 15:32:25',
        ]);

        DB::table('walls')->insert([
            'title' => 'Alerta geral para todos',
            'body' => '.....................Danger....................',
            'datecreated' => '2023-09-11 18:00:00',
        ]);
    }
}
