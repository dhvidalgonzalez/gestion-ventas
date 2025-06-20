<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descripcion',
        'unidad_medida_id',
        'marca_id',
        'color_id',
        'talla_id',
        'pasillo',
        'fecha_ingreso',
        'unidades_por_caja',
        'codigo_marketing',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function talla()
    {
        return $this->belongsTo(Talla::class, 'talla_id');
    }

    public function unidadMedida()
    {
        return $this->belongsTo(UnidadMedida::class, 'unidad_medida_id');
    }

    public function grupoDepto()
    {
        return $this->hasOne(GrupoDepartamento::class);
    }

    public function precios()
    {
        return $this->hasMany(PrecioProducto::class);
    }

    public function ppum()
    {
        return $this->hasOne(PPUM::class);
    }

    public function mayorista()
    {
        return $this->hasOne(CantidadPorMayor::class);
    }

    public function impuesto()
    {
        return $this->hasOne(Impuesto::class);
    }
}
