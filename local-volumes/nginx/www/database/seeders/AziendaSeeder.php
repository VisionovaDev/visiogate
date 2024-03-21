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
            $azienda=Azienda::create([
                'nome' => 'Ragione sociale',
                'indirizzo' => 'via ....',
                'citta' => 'Brescia',
                'cap' => '25125',
                'provincia' => 'BS',
                'nazione' => 'Italia',
                'sito' => 'https://www.nomedelsito.it',
                'email' => 'email@emaildaimpostare.ko',
                'telefono' => '0000000',
                'privacy_it' => 'La privacy aziendale in italiano',
                'privacy_en' => 'La privacy aziendale in inglese',
                'privacy_de' => 'La privacy aziendale in tedesco',
                'privacy_fr' => 'La privacy aziendale in francese',
                'privacy_es' => 'La privacy aziendale in spagnolo',                
            ]);

            //Aggiungo il logo al mediaLibrary
            $azienda->addMedia(storage_path('app/public/images/logo.png'))->preservingOriginal()->toMediaCollection();
            $this->command->info('Azienda di default creata');
        } else {
            $this->command->info('Azienda di default già presente');
        }
    }
}
