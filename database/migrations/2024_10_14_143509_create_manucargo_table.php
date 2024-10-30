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
        Schema::create('manucargo', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',10)->unique();
            $table->string('escala',2)->nullable();
            $table->string('nivel',5)->nullable();
            $table->string('cargo_categoria',250);
            $table->string('cargo_categoria_corta',100);
            $table->boolean('directivo');
            $table->string('codprog');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manucargo');
    }
};
