<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelloRegistrazione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelliRegistrazioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Controlla se la tabella è vuota
        if (ModelloRegistrazione::count() == 0) {
            ModelloRegistrazione::create([
                'nome' => 'default',
            ]);
            $this->command->info('Modello di registrazione di default creato');
        } else {
            $this->command->info('Modello di Registrazione di default già presente');
        }
    }
}
