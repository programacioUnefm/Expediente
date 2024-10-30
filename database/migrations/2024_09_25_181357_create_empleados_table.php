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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->enum('documento',['partida de nacimiento','acta de matrimonio'])->default('partida de nacimiento');
            $table->string('cedula',15);
            $table->string('rif',15 )->unique();
            $table->string('nombre1',50);
            $table->string('nombre2',50);
            $table->string('apellido1',50);
            $table->string('apellido2',50);
            $table->date('fecha_nacimiento');
            $table->text('direccion');
            $table->string('email1',80)->unique();
            $table->string('email2',80)->unique();
            $table->string('telefono1',11);
            $table->string('telefono2',11);
            $table->enum('sexo', ['M', 'F'])->default('M');
            $table->enum('estado_civil',['casado','soltero','divorciado'])->default('soltero');
            $table->decimal('peso',3,2);
            $table->decimal('altura',1,2);
            $table->enum('sangre',['A+','A-','AB+','AB-','O+','O-','NA']);
            $table->string('foto',150);
            $table->string('idiomas',100);
            $table->unsignedBigInteger('pais_nacimiento_id')->nullable();
            $table->unsignedBigInteger('nivel_profesional_id')->nullable();
            $table->unsignedBigInteger('parroquia_id')->nullable();
            $table->timestamps();

            
            $table->foreign('pais_nacimiento_id')->references('id')->on('paises');
            $table->foreign('nivel_profesional_id')->references('id')->on('nivel_profesional');
            $table->foreign('parroquia_id')->references('id')->on('parroquia');
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
