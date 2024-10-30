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
        Schema::create('estudios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('tipo_estudio_id')->nullable();
            $table->date('inicio');
            $table->date('fin');
            $table->text('titulo');
            $table->string('numfolio',50);
            $table->date('registrado');
            $table->enum('status',['activo','inactivo']); //todo: corregir el estatus
            $table->integer('horas_academicas');
            $table->timestamps();
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('tipo_estudio_id')->references('id')->on('tipo_estudios');
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudios');
    }
};
