<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Apoyo académico',
            'Salud y bienestar',
            'Aprendizaje',
            'Hogar',
            'Aficiones',
            'Idiomas',
            'Orientación profesional',
            'Ocio y deportes',
            'Familias',
            'Donación material',
            'Otros',
        ];

        foreach ($categorias as $descripcion) {
            DB::table('categorias')->insert([
                'descripcion' => $descripcion,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
