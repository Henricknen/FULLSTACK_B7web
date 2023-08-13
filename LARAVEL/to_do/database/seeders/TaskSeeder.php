<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder {    
    public function run(): void {
        Task::create([
            'title'=> '1º Task',
            'description'=> 'abjhgj',
            'due_date'=> '2023-08-13 00:17:00',
            'user_id'=> 1,
            'category_id'=> 1
        ]);
    }
}
