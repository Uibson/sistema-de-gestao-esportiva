<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome do evento
            $table->date('start_date'); // Data de início
            $table->date('end_date'); // Data de término
            $table->string('location'); // Local do evento
            $table->string('logo'); // Logo do evento (upload obrigatório)
            $table->foreignId('modality_id')->constrained('modalities'); // Relacionamento com modalidades
            $table->text('rules')->nullable(); // Regras específicas
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
