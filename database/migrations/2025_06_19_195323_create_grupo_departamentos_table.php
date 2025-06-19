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
        Schema::create('grupo_departamentos', function (Blueprint $table) {
            $table->id();

            // Relación con producto
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');

            // Campos estructurales
            $table->string('departamento', 50);
            $table->string('grupo', 50);
            $table->string('subfamilia', 50);

            // Opcional
            $table->string('avance_temporada')->nullable();

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
        Schema::dropIfExists('grupo_departamentos');
    }
};
