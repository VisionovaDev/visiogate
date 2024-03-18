<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelliRegistrazione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelliRegistrazioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Controlla se la tabella è vuota
        if (ModelliRegistrazione::count() == 0) {
            ModelliRegistrazione::create([
                'nome' => 'default',
            ]);
            $this->command->info('Modello di registrazione di default creato');
        } else {
            $this->command->info('Modello di Registrazione di default già presente');
        }
    }
}
