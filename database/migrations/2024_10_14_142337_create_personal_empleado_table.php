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
        Schema::create('personal_empleado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cedula');
            $table->unsignedBigInteger('tipo_personal_id');
            $table->unsignedBigInteger('condicion_id');
            $table->unsignedBigInteger('dedicacion_id');
            $table->unsignedBigInteger('tipo_jornada_id');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('manucargo_id');
            $table->date('fecha_ingreso');
            $table->date('fecha_antiguedad');
            $table->timestamps();
            
            $table->foreign('cedula')->references('cedula')->on('empleados');
            $table->foreign('tipo_personal_id')->references('id')->on('tipo_personal');
            $table->foreign('condicion_id')->references('id')->on('condiciones');
            $table->foreign('dedicacion_id')->references('id')->on('dedicaciones');
            $table->foreign('tipo_jornada_id')->references('id')->on('tipo_jornada');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('manucargo_id')->references('id')->on('manucargo');       
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_empleado');
    }
};
