<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {
        Schema::create('categories', function (Blueprint $table) {
            $table-> id();
            $table-> string('title')-> nullable(false);
            $table-> string('color')-> default('#FFFFF');
            $table-> foreignIdFor(User::class)-> references('id')-> on('users')-> onDelete('CASCADE');        // relaçionamento
            $table-> timestamps();
        });
    }

    public function down(): void {
        Schema::table('categories', function(Blueprint $table) {        // acessando tabel a 'categories'
            $table-> dropForeignIdFor(User::class);     // deletando a chave estrangeira
        });

        Schema::dropIfExists('categories');     // deletando tabela 'categories'
    }
};
