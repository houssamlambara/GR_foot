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
        Schema::table('terrains', function (Blueprint $table) {
            if (Schema::hasColumn('terrains', 'ville_id')) {
                $table->dropColumn('ville_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('terrains', function (Blueprint $table) {
            if (!Schema::hasColumn('terrains', 'ville_id')) {
                $table->unsignedBigInteger('ville_id')->nullable();
            }
        });
    }
}; 