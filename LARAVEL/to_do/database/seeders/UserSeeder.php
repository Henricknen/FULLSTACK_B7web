<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {

    public function run(): void {       // método 'run' rodar permtie fazer a configuração do usuário
        User::create([
            'name'=> 'Luis Henrique Silva Ferreira',
            'email'=> 'l.henrick@live.com',
            'password'=> Hash::make('2023')
        ]);
    }
}
