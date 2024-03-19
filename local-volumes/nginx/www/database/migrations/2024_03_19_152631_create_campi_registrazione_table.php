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
        Schema::create('campi_registrazione', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registrazione_id')->constrained('registrazioni')->onDelete('cascade');
            $table->foreignId('campi_modelli_registrazione_id')->constrained('campi_modelli_registrazione')->onDelete('cascade');
            $table->text('valore');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campi_registrazione');
    }
};
