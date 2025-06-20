<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            MarcaSeeder::class,
            ColorSeeder::class,
            TallaSeeder::class,
            ConfiguracionSistemaSeeder::class,
            ProductoSeeder::class,
            GrupoDepartamentoSeeder::class,
            PrecioProductoSeeder::class,
            PpumSeeder::class,
            CantidadPorMayorSeeder::class,
            ImpuestoSeeder::class,
            UnidadMedidasSeeder::class,
        ]);
    }

}
