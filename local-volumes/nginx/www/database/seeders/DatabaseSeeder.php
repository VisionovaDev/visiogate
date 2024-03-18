<?php

namespace Database\Seeders;

use App\Models\User;
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

        $adminDetails = config('visiongate.admin_user');
        $adminExists = User::where('email', $adminDetails['email'])->exists();
        if (!$adminExists) {
            User::create([
                'name' => $adminDetails['name'],
                'email' => $adminDetails['email'],
                'password' => Hash::make($adminDetails['password']),
            ]);
            $this->command->info('Admin user created successfully.');
        } else {
            $this->command->info('Admin user already exists.');
        }
        //crea l'azienda di default
        $this->call([AziendaSeeder::class]);

        //crea la sede di default
        $this->call([SediSeeder::class]);

        //crea il varco di default
        $this->call([VarchiSeeder::class]);

        //crea i badges di default
        $this->call([BadgeSeeder::class]);

        //crea i reparti di default
        $this->call([RepartoSeeder::class]);

        //crea il modello di registrazione di default
        $this->call([ModelliRegistrazioneSeeder::class]);
    }
}
