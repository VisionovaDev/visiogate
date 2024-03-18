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
        Schema::create('persone', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reparto_id')->constrained('reparti')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nome');
            $table->string('cognome');
            $table->string('email');
            $table->boolean('interno')->default(false);
            $table->string('telefono')->nullable();
            $table->boolean('accetta_visite')->default(false);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persone');
    }
};
