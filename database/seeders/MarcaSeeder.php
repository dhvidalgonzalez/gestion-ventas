<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Models\Marca::insert([
            ['nombre' => 'Nike'],
            ['nombre' => 'Adidas'],
            ['nombre' => 'Puma'],
        ]);
    }
}
