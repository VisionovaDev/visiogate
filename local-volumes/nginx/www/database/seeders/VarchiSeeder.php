<?php

namespace Database\Seeders;

use App\Models\Varchi;
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
      $varchiExists = Varchi::where('id', 1)->exists();
      if (!$varchiExists) {
        Varchi::create([
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
