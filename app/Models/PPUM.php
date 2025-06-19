<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/PPUM.php
class PPUM extends Model
{
    protected $fillable = [
        'producto_id', 'factor_multiplicador', 'tipo_envase', 'peso_drenado'
    ];
    public function producto() { return $this->belongsTo(Producto::class); }
}


