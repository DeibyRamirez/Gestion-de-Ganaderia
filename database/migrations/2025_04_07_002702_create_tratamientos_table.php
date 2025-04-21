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
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id('id_tratamiento');
            $table->foreignId('id_gestor')->constrained('users', 'id_usuario')->onDelete('cascade');
            $table->foreignId('id_historial')->constrained('historial_medico', 'id_historial')->onDelete('cascade');
            $table->text('descripcion');
            $table->date('fecha_tratamiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tratamientos');
    }
};
