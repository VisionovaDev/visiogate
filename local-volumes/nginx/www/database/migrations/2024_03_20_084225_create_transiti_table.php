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
            $table->foreignId('tipo_transiti_id')->constrained('tipo_transiti')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('abilitato');            
            $table->timestamps();
            $table->softDeletes();
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
