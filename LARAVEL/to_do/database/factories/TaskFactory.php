<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory {
    
    public function definition(): array {
        $user = User::all()-> random();     // definindo usuário
        while(count($user-> categories) == 0) {     // verificando se usuário tem categorias
            $user = User::all()-> random();     // se não tiver será gerado outro usuário
        }

        return [
            'title'=> $this-> faker-> text(30),
            'description'=> $this-> faker-> text(60),
            'due_date'=> $this-> faker-> dateTime(),
            'user_id'=> $user,
            'category_id'=> $user->categories-> random(),      // pegando uma categoria aleatória do usuário
        ];
    }
}
