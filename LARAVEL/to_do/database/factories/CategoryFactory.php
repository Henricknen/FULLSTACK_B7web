<?php

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create(); // Mova esta linha para dentro do método definition()

        return [
            'title' => $this->faker->text(30),            // retornando um 'title' do tipo 'text' de 30 caracteres
            'color' => $this->faker->safeHexColor(),          // retornando cor em hexadeçimal
            'user_id' => 1,
        ];
    }
}