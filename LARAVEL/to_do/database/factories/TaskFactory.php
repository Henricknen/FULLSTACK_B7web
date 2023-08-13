<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    
    public function definition(): array {
        return [
            'title'=> $this-> faker-> text(30),
            'description'=> $this-> faker-> text(60),
            'due_date'=> $this-> faker-> dateTime(),
            'user_id'=> User::all()-> random(),
            'category_id'=> Category::all()-> random(),      // ultilizando model 'Category' para pesquisar todas categorias e seleçionar uma aleatóriamente
        ];
    }
}
