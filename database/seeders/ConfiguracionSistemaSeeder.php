<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfiguracionSistemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Models\ConfiguracionSistema::insert([
            ['clave' => 'iva', 'valor' => '0.19'],
            ['clave' => 'margen_default', 'valor' => '30'],
        ]);
    }

}
