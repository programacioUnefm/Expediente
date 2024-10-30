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
        Schema::create('sueldos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dedicacion_id');
            $table->integer('hora');
            $table->double('sueldo');
            $table->unsignedBigInteger('tipo_personal_id');
            $table->unsignedBigInteger('tabulador_id');
            $table->timestamps();

            $table->foreign('dedicacion_id')->references('id')->on('dedicaciones');
            $table->foreign('tipo_personal_id')->references('id')->on('tipo_personal');
            $table->foreign('tabulador_id')->references('id')->on('tabuladores');
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sueldos');
    }
};
