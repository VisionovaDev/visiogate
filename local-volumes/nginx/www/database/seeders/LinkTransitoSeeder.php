<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\LinkTransito;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LinkTransitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Controlla se la tabella è vuota
        if (LinkTransito::count() == 0) {
            LinkTransito::create([
                'varchi_id' => 1, // Assumendo che il varco con id=1 esista
                'codice' => Str::random(5), // Genera una stringa casuale di 5 caratteri
                'abilitato' => 1, // Imposta il campo abilitato a 1
            ]);
            $this->command->info('Link di transito di default creato');
        }
        else
        {
            $this->command->info('Link di transito già presenti');
        }
    }
}
