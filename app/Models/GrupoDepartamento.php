<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/GrupoDepartamento.php
class GrupoDepartamento extends Model
{
    protected $fillable = ['producto_id', 'departamento', 'grupo', 'subfamilia', 'avance_temporada'];
    public function producto() { return $this->belongsTo(Producto::class); }
}


