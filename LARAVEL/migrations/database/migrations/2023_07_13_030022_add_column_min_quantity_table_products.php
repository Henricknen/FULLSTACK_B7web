<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {        // no método 'up' é definidas as ações que serão executadas
        Schema::table('products', function(Blueprint $table) {        // 'Schema' açessa a tabela 'products' e function reçebe 'Blueprint' os campos da tabela
            $table-> integer('min_quantity')     // criando um nova 'coluna' chamada de 'min_quantity' na tabela
            -> default(1)
            -> after('quantity');       // 'min_quantity' ficará depois 'after' de 'quantity'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {      // o método 'down' reverte a ação que foi feita no método 'up' 
        Schema::table('products', function(Blueprint $table) {
            $table-> dropColumn('min_quantity');      // deletabdo a 'coluna'
        });
    }
};
