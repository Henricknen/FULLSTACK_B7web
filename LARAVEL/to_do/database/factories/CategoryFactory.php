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
            'title' => $this->faker->text(30),            // retornando um 'title' do tipo 'text' de 30 caracteres
            'color' => $this->faker->safeHexColor(),          // retornando cor em hexadeçimal
            'user_id' => User::all()->random()     // seleçiona um usuário aleatóriamente
        ];
    }
}