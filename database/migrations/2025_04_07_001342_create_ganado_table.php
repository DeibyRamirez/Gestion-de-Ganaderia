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
        Schema::create('ganado', function (Blueprint $table) {
            $table->id('id_vaca');
            $table->foreignId('id_ganadero')->constrained('users','id_usuario')->onDelete('cascade');
            $table->string('nombre', 80)->nullable();
            $table->string('raza', 80)->nullable();
            $table->integer('edad')->nullable();
            $table->enum('tipo', ['carne','leche'])->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganado');
    }
};
