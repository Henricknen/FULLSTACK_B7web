<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    
    public function definition(): array {
        return [
            'title'=> $this-> faker-> text(30),
            'color'=> $this-> faker-> safeHexColor(),
            'user_id'=> 1,
        ];
    }
}
