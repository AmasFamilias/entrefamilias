<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HabilidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('habilidades')->insert([
            'habilidad' => 'Técnicas',
            'descripcion' => 'Están directamente relacionadas con el dominio de conocimientos y técnicas específicas 
                              que permiten realizar tareas prácticas y técnicas en diversos campos.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('habilidades')->insert([
            'habilidad' => 'Interpersonales',
            'descripcion' => 'Están vinculadas con aspectos como la comunicación efectiva, el trabajo en equipo y la empatía.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        DB::table('habilidades')->insert([
            'habilidad' => 'Cognitivas',
            'descripcion' => 'Están asociadas con la creatividad, el aprendizaje y la resolución de conflictos.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('habilidades')->insert([
            'habilidad' => 'Físicas',
            'descripcion' => 'Están relacionadas con la coordinación motora y el rendimiento físico.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('habilidades')->insert([
            'habilidad' => 'Gestión',
            'descripcion' => 'Están relacionadas con la negociación y la toma de decisiones mediante la evaluación.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
