<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tournois', function (Blueprint $table) {
            // Modifier la colonne statut pour accepter en_attente comme valeur par défaut
            DB::statement("ALTER TABLE tournois MODIFY COLUMN statut ENUM('en_attente', 'en_cours', 'termine') DEFAULT 'en_attente'");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tournois', function (Blueprint $table) {
            // Retourner à l'ancien état
            DB::statement("ALTER TABLE tournois MODIFY COLUMN statut ENUM('en_cours', 'termine') DEFAULT 'en_cours'");
        });
    }
}; 