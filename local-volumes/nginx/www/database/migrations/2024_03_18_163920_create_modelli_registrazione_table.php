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
        Schema::create('modelli_registrazione', function (Blueprint $table) {
            $table->id();
            $table->string('nome');           
            $table->timestamps();
            $table->softDeletes(); // Aggiunge il campo 'deleted_at' per il soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelli_registrazione');
    }
};
