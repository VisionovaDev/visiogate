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
        Schema::create('registrazioni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modelli_registrazione_id')->constrained('modelli_registrazione')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('badge_id')->constrained('badges')->onUpdate('cascade')->onDelete('cascade');
            $table->string('lingua');           
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrazioni');
    }
};
