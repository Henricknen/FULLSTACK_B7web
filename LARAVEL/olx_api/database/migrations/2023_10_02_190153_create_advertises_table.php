<?php

use App\Models\User;
use App\Models\Category;
use App\Models\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('advertises', function (Blueprint $table) {
            $table-> id();
            $table-> string('ritle');
            $table-> float('price');
            $table-> boolean('isNegotiable');
            $table-> text('description')-> nullable();      // pode ser nulo
            $table-> foreignId(User::class);        // relacionamento com 'user_id'
            $table-> foreignId(Category::class);
            $table-> foreignId(State::class);            
            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('advertises');
    }
};
