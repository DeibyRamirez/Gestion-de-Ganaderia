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
        Schema::create('produccion', function (Blueprint $table) {
            $table->id('id_produccion');
            $table->foreignId('id_vaca')->constrained('ganado', 'id_vaca')->onDelete('cascade');
            $table->enum('tipo_produccion', ['leche', 'carne']);
            $table->decimal('cantidad', 10, 2);
            $table->timestamp('fecha')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produccion');
    }
};
