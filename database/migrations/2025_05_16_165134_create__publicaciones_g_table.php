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
        Schema::create('publicaciones_ganado', function (Blueprint $table) {
            $table->id('id_publicacion');
            $table->foreignId('id_vaca')->constrained('ganado', 'id_vaca')->onDelete('cascade');
            $table->foreignId('id_ganadero')->constrained('users', 'id_usuario')->onDelete('cascade');
            $table->decimal('precio', 10, 2);
            $table->text('descripcion');
            $table->enum('estado', ['disponible', 'vendido'])->default('disponible');
            $table->timestamp('fecha')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones_ganado');
    }
};
