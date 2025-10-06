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
        Schema::create('deceaseds', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('fecha_nacimiento')->nullable();
            $table->string('fecha_defuncion');
            $table->string('causa_muerte')->nullable();
            $table->string('lugar_defuncion')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deceaseds');
    }
};