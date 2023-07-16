<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;      // importando biblioteca 'DB'
use Illuminate\Support\Facades\Hash;

class CreateUserAnddressSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('users')-> insert([       // acessando tabela 'users' e ultilizando método para enserir um novo usuário
            "name"=> "Luis Henrique S F",
            "email"=> "laravel@hotmail.com",
            "password"=> Hash:: make("123456"),     // 'Hash:: make()' gera um hash do password
        ]);
        
        DB::table('addresses')-> insert([       // acessando tabela 'adresses' e inserindo novo endereço
            "address"=> "Rua dos bobos, nº 0"
        ]);
    }
}
