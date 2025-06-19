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
         Schema::create('precio_productos', function (Blueprint $table) {
            $table->id();

            // Relación con producto
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');

            // Precios y márgenes
            $table->decimal('precio_costo', 10, 2);
            $table->decimal('precio_venta', 10, 2);
            $table->decimal('margen1', 5, 2)->nullable();
            $table->decimal('margen2', 5, 2)->nullable();
            $table->decimal('margen3', 5, 2)->nullable();

            // Información de auditoría
            $table->string('usuario', 100); // Usuario que creó o modificó el precio

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
        Schema::dropIfExists('precio_productos');
    }
};
