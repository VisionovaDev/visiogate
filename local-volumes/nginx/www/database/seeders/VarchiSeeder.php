<?php

namespace Database\Seeders;

use App\Models\Varco;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VarchiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      //inserisce il varco di default
      $varchiExists = Varco::where('id', 1)->exists();
      if (!$varchiExists) {
        Varco::create([
              'nome' => 'Ingresso principale',
              'sedi_id' => 1,
              'is_ingresso' => 1,
              'is_uscita' => 1                            
          ]);
          $this->command->info('Varco di default creato');
      } else {
          $this->command->info('Varco di default già presente');
      }
    }
}
