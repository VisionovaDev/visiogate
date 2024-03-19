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
        Schema::create('transiti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('varchi_id')->constrained('varchi')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('link_transiti_id')->constrained('transiti')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('registrazioni_id')->constrained('registrazioni')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('is_ingresso');
            $table->boolean('is_uscita');
            $table->boolean('abilitato');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transiti');
    }
};
