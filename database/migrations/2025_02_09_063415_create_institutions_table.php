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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome da instituição
            $table->string('cnpj_cpf')->unique(); // CNPJ ou CPF
            $table->string('type'); // Tipo de entidade (Escola, Universidade, Clube, etc.)
            $table->string('email')->unique(); // Email institucional
            $table->string('logo'); // Caminho da logo (upload obrigatório)
            $table->text('address')->nullable(); // Endereço (opcional)
            $table->string('inep')->nullable(); // INEP (apenas para escolas)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
