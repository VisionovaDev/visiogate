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
        Schema::table('badges', function (Blueprint $table) {
           
            // Assicura l'unicità della combinazione di 'prefisso' e 'numero'
            //TODO per ora non funziona per un baco
             # $table->unique(['sede_id','prefisso', 'numero'],'unico_codice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('badges', function (Blueprint $table) {
            # $table->dropUnique('unico_codice');
        });
    }
};
