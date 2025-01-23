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
        Schema::table('mensajes', function (Blueprint $table) {
            $table->unsignedBigInteger('vacante_id'); // Añadir columna para vacante_id

            // Agregar la relación con la tabla de vacantes
            $table->foreign('vacante_id')->references('id')->on('vacantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mensajes', function (Blueprint $table) {
            $table->dropForeign('mensajes_vacante_id_foreign');
            $table->dropColumn('vacante_id');
        });
    }
};
