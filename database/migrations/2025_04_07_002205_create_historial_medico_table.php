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
        Schema::create('historial_medico', function (Blueprint $table) {
            $table->id('id_historial');
            $table->foreignId('id_vaca')->constrained('ganado', 'id_vaca')->onDelete('cascade');
            $table->text('sintomas')->nullable();
            $table->text('diagnostico')->nullable();
            $table->date('fecha_diagnostico')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_medico');
    }
};
