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
        Schema::create('empleado_discapacidad', function (Blueprint $table) {
            $table->id();
            $table->string('cedula',15);
            $table->unsignedBigInteger('tipo_discapacidad_id')->nullable();
            $table->date('registrado');
            $table->timestamps();
            $table->foreign('cedula')->references('cedula')->on('empleados');
            $table->foreign('tipo_discapacidad_id')->references('id')->on('tipo_discapacidades');
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_discapacidad');
    }
};
