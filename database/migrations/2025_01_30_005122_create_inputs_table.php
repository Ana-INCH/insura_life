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
        Schema::create('inputs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funeral_home_id')->nullable();
            $table->foreign('funeral_home_id')->references('id')->on('funeral_homes')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('name', 100);
            $table->string('description', 100);
            $table->decimal('unit_price', 10, 2);
            $table->integer('stock');
            $table->string('category', 100);
            $table->string('code', 100)->unique();
            $table->smallInteger('status')->default(1);
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
        Schema::dropIfExists('inputs');
    }
};