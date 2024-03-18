<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reparto;

class RepartoSeeder extends Seeder
{
    public function run()
    {
        $reparti = [
            [
                'sedi_id' => 1,
                'nome_it' => 'Direzione',
                'nome_en' => 'Management',
                'nome_de' => 'Geschäftsleitung',
                'nome_fr' => 'Direction',
                'nome_es' => 'Dirección',
            ],
            [
                'sedi_id' => 1,
                'nome_it' => 'Ufficio commerciale',
                'nome_en' => 'Commercial office',
                'nome_de' => 'Handelsbüro',
                'nome_fr' => 'Bureau commercial',
                'nome_es' => 'Oficina comercial',
            ],
            [
                'sedi_id' => 1,
                'nome_it' => 'Produzione',
                'nome_en' => 'Production',
                'nome_de' => 'Produktion',
                'nome_fr' => 'Production',
                'nome_es' => 'Producción',
            ],
            [
                'sedi_id' => 1,
                'nome_it' => 'Ufficio tecnico',
                'nome_en' => 'Technical Office',
                'nome_de' => 'Technisches Büro',
                'nome_fr' => 'Bureau technique',
                'nome_es' => 'Oficina técnica',
            ],
            [
                'sedi_id' => 1,
                'nome_it' => 'Amministrazione',
                'nome_en' => 'Administration',
                'nome_de' => 'Verwaltung',
                'nome_fr' => 'Administration',
                'nome_es' => 'Administración',
            ],
        ];

        if (Reparto::count() == 0) {
            foreach ($reparti as $reparto) {
                Reparto::create($reparto);
            }
            $this->command->info('I Reparti di default sono stati creati');
        } else {
            $this->command->info("La tabella reparti non è vuota. Il seeding non verrà eseguito");
        }
    }
}
