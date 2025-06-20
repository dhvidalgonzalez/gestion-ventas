<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Models\Talla::insert([
            ['valor' => 'S'],
            ['valor' => 'M'],
            ['valor' => 'L'],
        ]);
    }

}
