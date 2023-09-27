<?php

use App\Models\advertise;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('advertises_images', function (Blueprint $table) {
            $table-> id();
            $table-> string('url');
            $table-> foreignIdFor(advertise::class);
            $table-> boolean('featured');
            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('advertises_images');
    }
};
