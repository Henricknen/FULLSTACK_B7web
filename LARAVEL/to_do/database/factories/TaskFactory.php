<?php

namespace Database\Factories;

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
            'user_id'=> 1,
            'category_id'=> 1,
        ];
    }
}
