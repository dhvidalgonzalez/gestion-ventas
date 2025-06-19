<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Marca.php
class Marca extends Model
{
    protected $fillable = ['nombre'];
    public function productos() { return $this->hasMany(Producto::class); }
}

