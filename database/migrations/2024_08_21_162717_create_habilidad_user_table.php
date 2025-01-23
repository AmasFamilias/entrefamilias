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
        Schema::create('habilidad_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('habilidad_id')->constrained('habilidades')->onDelete('cascade');  // Apunta a 'habilidades'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('habilidad_user');
    }
};
