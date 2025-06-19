<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Producto.php
class Producto extends Model
{
    protected $fillable = [
        'codigo', 'descripcion', 'unidad_medida', 'marca_id',
        'pasillo', 'fecha_ingreso', 'unidades_por_caja', 'codigo_marketing'
    ];

    public function marca()        { return $this->belongsTo(Marca::class); }
    public function grupoDepto()  { return $this->hasOne(GrupoDepartamento::class); }
    public function precios()     { return $this->hasMany(PrecioProducto::class); }
    public function ppum()        { return $this->hasOne(PPUM::class); }
    public function mayorista()   { return $this->hasOne(CantidadPorMayor::class); }
    public function impuesto()    { return $this->hasOne(Impuesto::class); }
}

