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
        Schema::table('organizacion_user', function (Blueprint $table) {
            $table->string('role')->default('colaborador')->after('organizacion_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organizacion_user', function ($table) {
            if (Schema::hasColumn('organizacion_user', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
