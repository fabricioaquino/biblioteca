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
        Schema::create('livro_assunto', function (Blueprint $table) {
            $table->foreignId('livro_cod')->constrained('livros', 'cod')->cascadeOnDelete();
            $table->foreignId('assunto_cod')->constrained('assuntos', 'cod')->cascadeOnDelete();
            $table->primary(['livro_cod', 'assunto_cod']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_assunto');
    }
};
