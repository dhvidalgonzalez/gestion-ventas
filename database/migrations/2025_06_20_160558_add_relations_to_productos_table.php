<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationsToProductosTable extends Migration
{
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            // Eliminar columna antigua si existe
            if (Schema::hasColumn('productos', 'unidad_medida')) {
                $table->dropColumn('unidad_medida');
            }

            // Agregar claves foráneas
           // $table->foreignId('unidad_medida_id')->nullable()->constrained('unidad_medidas')->onDelete('set null');
           // $table->foreignId('talla_id')->nullable()->constrained('tallas')->onDelete('set null');
           // $table->foreignId('color_id')->nullable()->constrained('colores')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign(['unidad_medida_id']);
            $table->dropForeign(['talla_id']);
            $table->dropForeign(['color_id']);

            $table->dropColumn(['unidad_medida_id', 'talla_id', 'color_id']);

            // Opcionalmente volver a crear la columna antigua
            $table->string('unidad_medida', 10)->nullable();
        });
    }
}
