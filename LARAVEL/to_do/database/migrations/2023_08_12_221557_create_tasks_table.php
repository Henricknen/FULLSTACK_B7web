<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table-> id();
            $table-> boolean('is_done')-> default(false);        // 'is_done' indica se a 'task' está marcada ou não
            $table-> string('title');
            $table-> string('description');
            $table-> dateTime('due_date');
            $table-> foreignIdFor(User::class)-> references('id')-> on('users')-> onDelete('CASCADE');        // relaçionamento
            $table-> foreignIdFor(Category::class)-> references('id')-> on('categories')-> onDelete('CASCADE');        // relaçionamento
            $table-> timestamps();
        });
    }

    
    public function down(): void {
        Schema::table('tasks', function(Blueprint $table) {        // acessando tabel a 'tasks'
            $table-> dropForeignIdFor(User::class);     // deletando a chave estrangeira
            $table-> dropForeignIdFor(Category::class);
        });

        Schema::dropIfExists('tasks');
    }
};
