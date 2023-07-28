<?php
namespace Database\Factories;

// database/factories/TaskFactory.php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\Category;
use App\Models\User;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
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

