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
        Schema::create('varchi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sede_id')->constrained('sedi')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nome');           
            $table->boolean('is_entrata')->default(true);
            $table->boolean('is_uscita')->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('varchi');
    }
};
