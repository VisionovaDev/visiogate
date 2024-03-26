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
        Schema::create('link_transiti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('varco_id')->constrained('varchi')->onUpdate('cascade')->onDelete('cascade');
            $table->string('codice');
            $table->boolean('is_abilitato')->default(true);           
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_transiti');
    }
};
