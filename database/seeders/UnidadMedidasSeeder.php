<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UnidadMedidasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('unidad_medidas')->insert([
            [
                'nombre' => 'Metro',
                'abreviatura' => 'm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Litro',
                'abreviatura' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Kilogramo',
                'abreviatura' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Gramo',
                'abreviatura' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Mililitro',
                'abreviatura' => 'ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Centímetro',
                'abreviatura' => 'cm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Unidad',
                'abreviatura' => 'u',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Caja',
                'abreviatura' => 'cj',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]
        );
    }
}
