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
        Schema::create('carga_familiares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('tipo_discapacidad_id')->nullable(); 
            $table->string('cedula_fam',15)->unique()->nullable();
            $table->string('nombre1',50);
            $table->string('nombre2',50);
            $table->string('apellido1',50);
            $table->string('apellido2',50);
            $table->date('nacimiento');
            $table->enum('sexo',['M','F'])->default('M');
            $table->enum('parentesco',['padre','hijo','esposo']); //todo: corregir el parentesco
            $table->date('registrado');
            $table->date('fallecimiento')->nullable();
            $table->timestamps();

            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('tipo_discapacidad_id')->references('id')->on('tipo_discapacidades');
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carga_familiares');
    }
};
