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
        Schema::create('users', function(Blueprint $table) {        // criando tabela de 'usuários'
            $table-> id();
            $table-> string('name');
            $table-> string('email')-> unique();
            $table-> string('cpf')-> unique();
            $table-> string('password');
        });
     
        Schema::create('units', function(Blueprint $table) {        // criando tabela das 'unidades'
            $table-> id();
            $table-> string('name');
            $table-> integer('id_owner');
        });
     
        Schema::create('unitpeoples', function(Blueprint $table) {        // criando tabela de 'dados' das unidades
            $table-> id();
            $table-> string('name');
            $table-> integer('id_unit');
            $table-> date('birthdate');
        });
     
        Schema::create('unitvehicles', function(Blueprint $table) {        // criando tabela de 'veiculos'
            $table-> id();
            $table-> string('title');
            $table-> string('color');
            $table-> string('plate');
            $table-> integer('id_unit');
        });
     
        Schema::create('unitpets', function(Blueprint $table) {        // criando tabela dos 'animais'
            $table-> id();
            $table-> string('name');
            $table-> string('race');
            $table-> integer('id_unit');
        });
     
        Schema::create('walls', function(Blueprint $table) {        // criando tabela do 'mural de avisos'
            $table-> id();
            $table-> string('title');
            $table-> string('body');
            $table-> date('datecreated');
        });
     
        Schema::create('walllikes', function(Blueprint $table) {        // criando tabela de 'likes' dod posts
            $table-> id();
            $table-> integer('id_wall');
            $table-> integer('id_user');
        });
     
        Schema::create('docs', function(Blueprint $table) {        // criando tabela dos 'documentos' do comdominio
            $table-> id();
            $table-> string('title');
            $table-> string('fileurl');
        });
     
        Schema::create('billets', function(Blueprint $table) {        // criando tabela dos 'boletos' do comdominio
            $table-> id();
            $table-> integer('id_unit');
            $table-> string('title');
            $table-> string('fileurl');
        });
     
        Schema::create('foundendlost', function(Blueprint $table) {        // criando tabela de 'achados e perdidos'
            $table-> id();
            $table-> string('status')-> default('LOST');
            $table-> string('photo');
            $table-> string('description');
            $table-> string('where');
            $table-> string('datecreated');
        });
     
        Schema::create('areas', function(Blueprint $table) {        // criando tabela das 'areas'
            $table-> id();
            $table-> integer('allowed')-> default(1);
            $table-> string('title');
            $table-> string('cover');
            $table-> string('days');
            $table-> time('start_time');
            $table-> time('end_time');
        });
     
        Schema::create('areasdisabledays', function(Blueprint $table) {        // criando tabela para 'desabilitar dias espeçificos'
            $table-> id();
            $table-> integer('id_area');
            $table-> date('day');
        });
     
        Schema::create('reservations', function(Blueprint $table) {        // criando tabela das 'reservas'
            $table-> id();
            $table-> integer('id_unit');
            $table-> integer('id_area');
            $table-> datetime('reservation_date');
        });
     
        Schema::create('warnings', function(Blueprint $table) {        // criando tabela do 'livro de ocorrençia'
            $table-> id();
            $table-> integer('id_unit');
            $table-> string('title');
            $table-> data('datacreated');
            $table-> text('photos');
            $table-> string('status')-> default('IN_REVIEW');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
        Schema::dropIfExists('units');
        Schema::dropIfExists('unitpeoples');
        Schema::dropIfExists('unitvehicles');
        Schema::dropIfExists('unitpets');
        Schema::dropIfExists('walls');
        Schema::dropIfExists('walllikes');
        Schema::dropIfExists('docs');
        Schema::dropIfExists('billets');
        Schema::dropIfExists('foundendlost');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('areasdisabledays');
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('warnings');
        }
};
