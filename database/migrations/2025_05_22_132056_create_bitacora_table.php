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
        Schema::create('bitacora', function (Blueprint $table) {
            $table->id('id_bitacora');
            $table->string('tabla_afectada');
            $table->enum( 'accion',['INSERT','UPDATE','DELETE']);
            $table->integer('id_registro_afectado');
            $table->json('datos_anteriores')->nullable();
            $table->json('datos_nuevos')->nullable();
            $table->foreignId('usuario_id')->constrained('users','id_usuario')->onDelete('cascade');
            $table->timestamp('fecha_hora');
            $table->timestamps();

           

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacora');
    }
};

