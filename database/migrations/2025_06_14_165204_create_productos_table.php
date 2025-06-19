<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            // Datos del producto
            $table->string('codigo')->unique();                     // Código único del producto
            $table->string('descripcion', 100);                     // Nombre descriptivo
            $table->string('unidad_medida', 10)->nullable();        // Ej: UNID, KG, LT

            // Relación con marca
            $table->foreignId('marca_id')->constrained('marcas')->onDelete('cascade');

            // Detalles de ubicación e ingreso
            $table->integer('pasillo')->default(0);
            $table->date('fecha_ingreso')->nullable();

            // Otros atributos opcionales
            $table->integer('unidades_por_caja')->nullable();       // Udxcaja
            $table->string('codigo_marketing')->nullable();         // Cod_cmarke (si aplica)

            // Precios base (también se pueden manejar en otra tabla como hicimos)
            $table->decimal('precio_base', 10, 2)->nullable();      // Si quieres guardar aquí directamente también

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
