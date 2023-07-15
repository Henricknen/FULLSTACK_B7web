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
        Schema::table('users', function (Blueprint $table) {
            //
            $table-> unsignedBigInteger('address_id')-> nullable();      // adiçionando campo 'address_id','unsigned' quer dizer que é numero positivo e 'BigInteger' diz que é um inteiro grande
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table-> dropColumn('address_id');      // deletando coluna 'address_id'

        });
    }
};
