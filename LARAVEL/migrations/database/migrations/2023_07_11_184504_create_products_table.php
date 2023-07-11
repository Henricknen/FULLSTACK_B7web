<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table-> id();       // 'id' do registro autoincrement e primary key
            $table-> string('name');        // 'name' nome do produto
            $table-> string('code')-> unique();     // 'code' codigo do produto 'unique' não deixa repetir
            $table-> integer('quantity')-> default(0);      // 'quantity' quantidade do produto como quantidade'default' 0
            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
