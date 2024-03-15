<?php

namespace Database\Seeders;

use App\Models\Azienda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AziendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //inserisce l'azienda di default
        $aziendaExists = Azienda::where('id', 1)->exists();
        if (!$aziendaExists) {
            Azienda::create([
                'nome' => 'Ragione sociale',
                'indirizzo' => 'via ....',
                'citta' => 'Brescia',
                'cap' => '25125',
                'provincia' => 'BS',
                'nazione' => 'Italia',
                'sito' => 'https://www.nomedelsito.it',
                'email' => 'email@emaildaimpostare.ko',
                'telefono' => '0000000',
                'logo_file_path' => '/storage/images/logo.png'                
            ]);
            $this->command->info('Azienda di default creata');
        } else {
            $this->command->info('Azienda di default già presente');
        }
    }
}