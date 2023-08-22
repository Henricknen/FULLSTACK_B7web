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
        $user = User::all()-> random();      // defindo usuário

        while(count($user-> categories) == 0) {      // se usuário não tiver 'categorias'
            $user = User::all()-> random();      // será gerado outro usuário
        }

        $category = $user-> categories-> random();        // pegando uma categoria aleatoria deste usuário '$user'

        return [
            'is_done' => $this-> faker -> boolean(),        // definindo 'is_done' como aleatório
            'title' => $this-> faker -> text(30),
            'description' => $this-> faker-> text(60),
            'due_date' => $this-> faker-> datetime(),
            'user_id' => $user-> id,
            'category_id' => $category-> id,
        ];
    }
}
