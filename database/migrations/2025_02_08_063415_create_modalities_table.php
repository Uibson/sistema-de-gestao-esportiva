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
        Schema::create('modalities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome da modalidade
            $table->string('type'); // Tipo (Individual, Coletiva, Mista)
            $table->text('rules')->nullable(); // Regras específicas
            $table->integer('min_participants'); // Mínimo de participantes
            $table->integer('max_participants'); // Máximo de participantes
            $table->string('age_category')->nullable(); // Restrições de idade/categoria
            $table->string('image')->nullable(); // Imagem representativa (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modalities');
    }
};
