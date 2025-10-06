<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            // Asegúrate de que la relación con 'branches' es correcta
            $table->foreignId('sucursal_id')->constrained('branches')->onDelete('cascade');
            $table->string('name');
            $table->string('position');
            $table->string('phone', 20)->nullable();
            $table->string('email')->nullable();
            $table->date('hiring_date'); // Asegúrate de que este campo no sea nullable si es obligatorio
            $table->boolean('status')->default(true); // Valor por defecto para status: 'activo' (true)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
