<?php

use App\Models\Advertise;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('advertise_images', function (Blueprint $table) {
            $table-> id();
            $table-> string('url');     // 'url' da imagem
            $table-> foreignIdFor(advertise::class);        // faz a leitura por injeção de de dependençia
            $table-> boolean('featured');
            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('advertise_images');
    }
};
