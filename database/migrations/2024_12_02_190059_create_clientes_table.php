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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cedula')->unique();
            $table->string('codigo_pais');
            $table->string('telefono');
            $table->string('servicio');
            $table->string('plan');
            $table->string('sector');
            $table->string('estacion_base');
            $table->string('tecnologia');
            $table->string('estado');
            $table->date('fecha_inicio');
            $table->date('fecha_finalizacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
