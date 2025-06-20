<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Models\Color::insert([
            ['nombre' => 'Rojo'],
            ['nombre' => 'Azul'],
            ['nombre' => 'Negro'],
        ]);
    }
}
