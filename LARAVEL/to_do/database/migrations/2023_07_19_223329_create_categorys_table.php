<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('categorys', function (Blueprint $table) {       // criação da tabela 'categorys'
            $table->id();
            $table->string('title');
            $table->string('color')->default('#FFFFFF');
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('CASCADE');       // relaçionamento entre tabela "categorys" e a tabela "users"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {

        Schema::table('categorys', function(Blueprint $table) {     // deletando a ForeignIdFor chave 'estrangeira'
            $table->dropForeignIdFor(User::class);
        });

        Schema::dropIfExists('categorys');
    }
};
