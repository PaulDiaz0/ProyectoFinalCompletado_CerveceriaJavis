<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: table('categorias')->insert([
            'nombre_categoria' => 'Cerveza',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB :: table('categorias')->insert([
            'nombre_categoria' => 'Tequila',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB :: table('categorias')->insert([
            'nombre_categoria' => 'Refrescos',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}