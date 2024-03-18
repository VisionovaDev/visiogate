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
        Schema::create('aziende', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('indirizzo')->nullable();
            $table->string('citta')->nullable();
            $table->string('cap')->nullable();
            $table->string('provincia',2)->nullable();
            $table->string('nazione')->nullable();
            $table->string('sito')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('privacy_it')->nullable();
            $table->string('privacy_en')->nullable();
            $table->string('privacy_de')->nullable();
            $table->string('privacy_fr')->nullable();
            $table->string('privacy_es')->nullable();
            $table->string('logo_file_path')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aziende');
    }
};
