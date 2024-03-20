<?php

namespace Database\Seeders;

use App\Models\TipoTransito;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoTransitiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (TipoTransito::count() == 0) {
          
            TipoTransito::create([
                    'nome' => 'Entrata'                    
                ]);
            
            TipoTransito::create([
                'nome' => 'Uscita'
            ]);
            $this->command->info('I TipoTransito di default sono stati creati');
        
        } else {
            $this->command->info("La tabella TipoTransito non è vuota. Il seeding non verrà eseguito.");
        }    
    }
}
