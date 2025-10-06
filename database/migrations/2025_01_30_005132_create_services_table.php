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
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insumo_id');
            $table->foreign('insumo_id')->references('id')->on('inputs')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            $table->string('tipo', 100);
            $table->string('descripcion', 255)->nullable();
            $table->decimal('precio', 10, 2);
            $table->integer('duracion')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('services');
    }
};