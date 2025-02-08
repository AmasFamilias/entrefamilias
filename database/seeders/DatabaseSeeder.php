<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(HabilidadesSeeder::class);
        $this->call(TalentosSeeder::class);
        $this->call(PrincipiosSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(TipoAnuncioSeeder::class);
    }
}
