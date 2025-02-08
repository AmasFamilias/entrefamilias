<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoAnuncioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            ['descripcion' => 'Oferta'],
            ['descripcion' => 'Petición'],
            ['descripcion' => 'Match familias'],
        ];

        DB::table('tipo_anuncio')->insert($tipos);
    }
}
