<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tournois', function (Blueprint $table) {
            $table->dropColumn('prix_inscription');
        });
    }

    public function down()
    {
        Schema::table('tournois', function (Blueprint $table) {
            $table->decimal('prix_inscription', 8, 2)->nullable();
        });
    }
}; 