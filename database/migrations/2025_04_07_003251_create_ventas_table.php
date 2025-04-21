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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');
            $table->foreignId('id_vendedor')->constrained('users', 'id_usuario')->onDelete('cascade');
            $table->foreignId('id_comprador')->constrained('users', 'id_usuario')->onDelete('cascade');
            $table->enum('producto', ['carne', 'leche']);
            $table->decimal('cantidad', 10, 2);
            $table->decimal('precio', 10, 2);
            $table->timestamp('fecha_venta')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
