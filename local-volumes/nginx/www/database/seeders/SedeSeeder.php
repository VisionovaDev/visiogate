<?php

namespace Database\Seeders;

use App\Models\Sede;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //inserisce la sede di default
        $sediExists = Sede::where('id', 1)->exists();
        if (!$sediExists) {
            Sede::create([
                'nome' => 'Sede unica',
                'indirizzo' => 'via ....',
                'citta' => 'Brescia',
                'cap' => '25125',
                'provincia' => 'BS',
                'nazione' => 'Italia',               
                'telefono' => '0000000',                
            ]);
            $this->command->info('Sede di default creata');
        } else {
            $this->command->info('Sede di default già presente');
        }
    }
}
