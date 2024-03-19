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
        Schema::create('campi_modelli_registrazione', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modelli_registrazione_id','indice1')->constrained('modelli_registrazione')->onUpdate('cascade')->onDelete('cascade');
            $table->char('lingua', 2);
            $table->string('nome');
            $table->string('label');
            $table->string('placeholder')->nullable();
            $table->enum('tipo', ['testo', 'checkbox', 'email','url','numero','select_reparto','select_persona','checkbox_privacy','checkbox_regolamento']);
            $table->boolean('obbligatorio');
            $table->integer('posizione');
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
        Schema::dropIfExists('campi_modelli_registrazione');
    }
};
