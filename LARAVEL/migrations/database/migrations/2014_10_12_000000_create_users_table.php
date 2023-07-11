<?php               
//  migration 'users' cria, define os usuários no banco de dados
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {      // método 'up' sobe(roda ) a migration
        Schema::create('users', function (Blueprint $table) {       // 'blueprint' é uma classe utilizada para definir a estrutura da tabela do banco de dados
            $table-> id();
            $table-> string('name');
            $table-> string('email')->unique();
            $table-> timestamp('email_verified_at')->nullable();
            $table-> string('password');
            $table-> rememberToken();
            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');      // se existir a tabela 'users' o método 'dropIfExists' exclui
    }
};
