<?php
namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(30),
            'description' => $this->faker->text(60),
            'due_date' => $this->faker->datetime(),
            'user_id' => User::all()->random(),
            'category_id' => Category::factory()->create()->id, // Cria uma nova categoria fictícia e pega o ID dela
        ];
    }
}
