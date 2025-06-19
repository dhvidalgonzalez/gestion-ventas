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
          Schema::create('configuracion_sistemas', function (Blueprint $table) {
            $table->id();

            // Clave de configuración (ej: 'iva', 'margen_default')
            $table->string('clave')->unique();

            // Valor asociado (puede ser numérico o texto)
            $table->string('valor');

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
        Schema::dropIfExists('configuracion_sistemas');
    }
};
