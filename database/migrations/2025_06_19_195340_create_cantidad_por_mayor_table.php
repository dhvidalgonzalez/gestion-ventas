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
        Schema::create('cantidad_por_mayor', function (Blueprint $table) {
            $table->id();

            // Relación con producto
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');

            // Cantidad mínima para aplicar precio por mayor
            $table->integer('cantidad')->unsigned();

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
        Schema::dropIfExists('cantidad_por_mayor');
    }
};
