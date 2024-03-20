<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /* versione originale
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
         fine versione originae */

        $this->call([UsersTableSeeder::class]);

       
        //crea l'azienda di default
        $this->call([AziendaSeeder::class]);

        //crea la sede di default
        $this->call([SedeSeeder::class]);

        //crea il varco di default
        $this->call([VarchiSeeder::class]);

        //crea i badges di default
        $this->call([BadgeSeeder::class]);

        //crea i reparti di default
        $this->call([RepartoSeeder::class]);

        //crea il modello di registrazione di default
        $this->call([ModelliRegistrazioneSeeder::class]);

        //crea i campi del modello di registrazione di default
        $this->call([CampiModelliRegistrazioneSeeder::class]);
        
        //crea un link per il transito di default
        $this->call([LinkTransitoSeeder::class]);

        //Inserisce i tipi di transito di default (Entrata e Uscita)
        $this->call([TipoTransitiSeeder::class]);

        //crea i ruoli di default ed assegna il ruolo di Admin all'utente Admin
        $this->call([RolesSeeder::class]);

    }
}
