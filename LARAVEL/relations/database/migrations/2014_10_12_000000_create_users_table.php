<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table-> id();
            $table-> string('name');
            $table-> string('email')->unique();
            $table-> timestamp('email_verified_at')-> nullable();
            $table-> string('password');
            $table-> unsignedBigInteger('address_id')-> nullable();      // adiçionando campo 'address_id','unsigned' quer dizer que é numero positivo e 'BigInteger' diz que é um inteiro grande
            $table-> rememberToken();
            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
    }
};
