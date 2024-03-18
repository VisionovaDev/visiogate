<?php

namespace Database\Seeders;

use App\Models\Badge;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Badge::count() == 0) {
            for ($i = 1; $i <= 20; $i++) {
                Badge::create([
                    'prefisso' => 'A',
                    'numero' => $i,
                    'sede_id' => 1, // Assicurati di avere un id valido per 'sede_id' o di rimuoverlo se non necessario
                ]);
            }
            $this->command->info('I Badges di default sono stati creati');
        } else {
            $this->command->info("La tabella badges non è vuota. Il seeding non verrà eseguito.");
        }
    }
}
