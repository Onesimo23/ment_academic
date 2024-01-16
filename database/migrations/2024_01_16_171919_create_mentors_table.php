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
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('course'); // Pode ser nulo se não for aplicável
            $table->string('specialization');
            $table->json('preferences'); // Usar JSON para armazenar preferências
            $table->boolean('active')->default(true); // Indicar se o mentor está ativo
            $table->rememberToken(); // Adicionar campo para "remember me"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};
