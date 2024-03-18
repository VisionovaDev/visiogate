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
        Schema::create('reparti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sedi_id')->constrained('sedi')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nome_it');
            $table->string('nome_en');
            $table->string('nome_de');
            $table->string('nome_fr');
            $table->string('nome_es');               
            $table->timestamps();
            $table->softDeletes(); // Supporto per il soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparti');
    }
};
