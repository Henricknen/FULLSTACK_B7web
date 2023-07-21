<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    
    public function run(): void {       // método 'run' executa o que for preçiso para configurar o usuário

        User::create([      // usuário será criado quando o 'seeder' roda
            'name' => 'Luis Henrique S F',
            'email' => 'l.henrick@live.com',
            'password' => Hash::make('1020304050')
        ]);

        User::create([
            'name' => 'FullStack',
            'email' => 'l.henrick@live.com',
            'password' => Hash::make('1020304050')
        ]);
        
    }
}
