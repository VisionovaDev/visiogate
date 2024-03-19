<?php

namespace Database\Seeders;

use App\Models\Registrazione;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegistrazioniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Registrazione::count()==0) {
            // Inserisce i dati specificati solo se esiste almeno un record nella tabella
            Registrazione::create([
                'modelli_registrazione_id' => 1,
                'badge_id' => 1,
                'lingua' => 'it',
            ]);
            $this->command->info('La registrazione di default è stata creata');
        } else {
            $this->command->info("La tabella registrazioni non è vuota. Il seeding non verrà eseguito");
        }
    }
}
