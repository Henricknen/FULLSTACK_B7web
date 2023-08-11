<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

class CategoryFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {

        return [
            'title' => $this->faker->text(30),
            'color' => $this->faker->safeHexColor(),
            'user_id' => User::factory()->create()->id
        ];
    }
}
