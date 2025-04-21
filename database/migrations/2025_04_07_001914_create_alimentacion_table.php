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
        Schema::create('alimentacion', function (Blueprint $table) {
            $table->id('id_alimentacion');
            $table->foreignId('id_vaca')->constrained('ganado', 'id_vaca')->onDelete('cascade');
            $table->text('plan_alimenticio')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimentacion');
    }
};
