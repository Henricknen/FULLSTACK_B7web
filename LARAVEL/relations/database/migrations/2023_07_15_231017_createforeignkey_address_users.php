<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('addresses', function (Blueprint $table) {
            $table-> foreign('user_id')        // adiçionando uma 'foreign key'
            -> references('id')
            -> on('users')
            // -> onDelete('SET NULL');        // quando for deletado o enderço que está referênçiado a um usuário, no mesmo será setado o valor de 'NULL'
            -> onDelete('CASCADE');      // se o endereço for deletado 'CASCADE' deleta tudo o que estiver relaçionado com ele
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('addresses', function (Blueprint $table) {
            $table-> dropForeign('user_id');
        });
    }
};
