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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_empleado_id');
            $table->unsignedBigInteger('tipo_movimiento');
            $table->string('num_mov');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('cargado');
            $table->string('responsable');
            $table->text('observaciones');
            $table->string('num_folio',200);
            $table->timestamps();
            $table->foreign('personal_empleado_id')->references('id')->on('personal_empleado');
            $table->foreign('tipo_movimiento')->references('id')->on('tipo_movimientos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
