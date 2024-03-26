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
        Schema::create('sedi', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('indirizzo')->nullable();
            $table->string('citta')->nullable();
            $table->string('cap')->nullable();
            $table->string('provincia',2)->nullable();
            $table->string('nazione')->nullable();
            $table->string('telefono')->nullable();
            $table->string('oggetto_email_entrata_it')->nullable();
            $table->string('oggetto_email_entrata_en')->nullable();
            $table->string('oggetto_email_entrata_de')->nullable();
            $table->string('oggetto_email_entrata_fr')->nullable();
            $table->string('oggetto_email_entrata_es')->nullable();        
            $table->string('msg_email_entrata_it')->nullable();
            $table->string('msg_email_entrata_en')->nullable();
            $table->string('msg_email_entrata_de')->nullable();
            $table->string('msg_email_entrata_fr')->nullable();
            $table->string('msg_email_entrata_es')->nullable();
            $table->string('oggetto_email_uscita_it')->nullable();
            $table->string('oggetto_email_uscita_en')->nullable();
            $table->string('oggetto_email_uscita_de')->nullable();
            $table->string('oggetto_email_uscita_fr')->nullable();
            $table->string('oggetto_email_uscita_es')->nullable();
            $table->string('msg_email_uscita_it')->nullable();
            $table->string('msg_email_uscita_en')->nullable();
            $table->string('msg_email_uscita_de')->nullable();
            $table->string('msg_email_uscita_fr')->nullable();
            $table->string('msg_email_uscita_es')->nullable();
            $table->string('regolamento_it')->nullable();
            $table->string('regolamento_en')->nullable();
            $table->string('regolamento_de')->nullable();
            $table->string('regolamento_fr')->nullable();
            $table->string('regolamento_es')->nullable();
            $table->boolean('is_email_entrata_abilitata')->default(false);
            $table->boolean('is_email_uscita_abilitata')->default(false);
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
        Schema::dropIfExists('sedi');
    }
};
