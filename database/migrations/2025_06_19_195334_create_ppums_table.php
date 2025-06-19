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
        Schema::create('ppums', function (Blueprint $table) {
            $table->id();

            // Relación con el producto
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');

            // Datos PPUM
            $table->decimal('factor_multiplicador', 8, 2);
            $table->string('tipo_envase', 50)->nullable();      // Ej: "LT", "GR", "UNID"
            $table->decimal('peso_drenado', 8, 2)->nullable();  // En gramos o ml

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
        Schema::dropIfExists('ppums');
    }
};
