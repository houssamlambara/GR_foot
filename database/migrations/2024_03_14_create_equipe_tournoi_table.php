<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('equipe_tournoi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipe_id')->constrained()->onDelete('cascade');
            $table->foreignId('tournoi_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Empêcher une équipe d'être inscrite plusieurs fois au même tournoi
            $table->unique(['equipe_id', 'tournoi_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipe_tournoi');
    }
}; 