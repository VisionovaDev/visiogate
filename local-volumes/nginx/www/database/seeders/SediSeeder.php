<?php

namespace Database\Seeders;

use App\Models\Sedi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SediSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //inserisce la sede di default
        $sediExists = Sedi::where('id', 1)->exists();
        if (!$sediExists) {
            Sedi::create([
                'nome' => 'Sede unica',
                'indirizzo' => 'via ....',
                'citta' => 'Brescia',
                'cap' => '25125',
                'provincia' => 'BS',
                'nazione' => 'Italia',
                'sito' => 'https://www.nomedelsito.it',
                'email' => 'email@emaildaimpostare.ko',
                'telefono' => '0000000',                
            ]);
            $this->command->info('Sede di default creata');
        } else {
            $this->command->info('Sede di default già presente');
        }
    }
}
