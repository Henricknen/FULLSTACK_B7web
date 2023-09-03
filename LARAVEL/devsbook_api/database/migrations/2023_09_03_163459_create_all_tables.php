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
        Schema::create('users', function (Blueprint $table) {
            $table-> id();
            $table-> string('email', 100);
            $table-> string('password', 200);
            $table-> string('name',100);
            $table-> date('birthdate');
            $table-> string('city', 100)-> nullable();
            $table-> string('work', 100)-> nullable();
            $table-> string('avatar', 100)-> default('default.jpg');
            $table-> string('cover', 100)-> default('cover.jpg');
            $table-> string('token', 200)-> nullable();
        });
        
        Schema::create('userrelations', function (Blueprint $table) {
            $table-> id();
            $table-> integer('user_from');
            $table-> integer('user_to');
            });
        
        Schema::create('posts', function (Blueprint $table) {
            $table-> id();
            $table-> integer('id_user');
            $table-> string('type', 20);
            $table-> dateTime('created_at');
            $table-> text('body');
            });
        
        Schema::create('postlikes', function (Blueprint $table) {
            $table-> id();
            $table-> integer('id_post');
            $table-> integer('id_user');
            $table-> dateTime('created_at');
            });
        
        Schema::create('postcomments', function (Blueprint $table) {
            $table-> id();
            $table-> integer('id_post');
            $table-> integer('id_user');
            $table-> dateTime('created_at');
            $table-> text('body');
            });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void {
        Schema::dropIfExists('users');
        Schema::dropIfExists('userrelations');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('postlikes');
        Schema::dropIfExists('postcomments');
    }
};
