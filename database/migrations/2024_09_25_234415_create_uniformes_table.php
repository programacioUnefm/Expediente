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
        Schema::create('uniformes', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->unsignedBigInteger('prenda_id');
            $table->string('talla',5);
            $table->timestamps();
            $table->foreign('prenda_id')->references('id')->on('prendas');
            $table->foreign('cedula')->references('cedula')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uniformes');
    }
};
