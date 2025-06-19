<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/CantidadPorMayor.php
class CantidadPorMayor extends Model
{
    protected $fillable = ['producto_id', 'cantidad'];
    public function producto() { return $this->belongsTo(Producto::class); }
}


