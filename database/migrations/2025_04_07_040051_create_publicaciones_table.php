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
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id('id_publicacion');
            $table->foreignId('id_ganadero')->constrained('users', 'id_usuario')->onDelete('cascade');
            $table->enum('tipo_producto', ['carne', 'leche']);
            $table->text('descripcion');
            $table->double('cantidad',10,2);
            $table->double('precio',10,2);
            $table->enum('estado', ['disponible', 'vendido']);
            $table->timestamp('fecha')->default(now());

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones');
    }
};
