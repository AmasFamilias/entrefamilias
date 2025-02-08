<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            $table->text('descrip_larga')->nullable()->after('imagen');
            $table->boolean('presencial')->nullable()->after('descrip_larga');
            $table->tinyInteger('virtual')->nullable()->after('presencial');
            $table->boolean('evento')->nullable()->after('virtual');
            $table->date('fecha_evento')->nullable()->after('evento');
            $table->foreignId('tipoanuncio_id')
                    ->nullable()
                    ->constrained('tipo_anuncio') // Nombre exacto de la tabla
                    ->after('categoria_id');
            $table->foreignId('organizacion_id')
                  ->nullable()
                  ->constrained('organizacion') // Nombre exacto de la tabla
                  ->onDelete('set null')
                  ->after('tipoanuncio_id');
            $table->json('etiquetas')->nullable()->after('organizacion_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            // Primero eliminamos las restricciones de clave foránea
            $table->dropForeign(['tipoanuncio_id']);
            $table->dropForeign(['organizacion_id']);

            // Luego eliminamos las columnas
            $table->dropColumn([
                'descrip_larga',
                'presencial',
                'virtual',
                'evento',
                'fecha_evento',
                'tipoanuncio_id',
                'organizacion_id',
                'etiquetas'
            ]);
        });
    }
};
