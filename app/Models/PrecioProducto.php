<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/PrecioProducto.php
class PrecioProducto extends Model
{
    protected $fillable = [
        'producto_id', 'precio_costo', 'precio_venta',
        'margen1', 'margen2', 'margen3', 'usuario'
    ];
    public function producto() { return $this->belongsTo(Producto::class); }
}


