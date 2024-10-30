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
        Schema::create('tabuladores', function (Blueprint $table) {
            $table->id();
            $table->string('cod',5)->unique();
            $table->string('nombre',250);
            $table->date('fecha');
            $table->boolean('actual');
            $table->double('reconversion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabuladores');
    }
};
