<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Controlla se la tabella dei ruoli è vuota
        if (Role::count() == 0) {
            $roles = ['Admin', 'Supervisor', 'Direzione', 'Receptionist'];

            foreach ($roles as $roleName) {
                $role = Role::create(['name' => $roleName]);

                // Se il ruolo è Admin, assegna questo ruolo all'utente con id = 1
                if ($roleName === 'Admin') {
                    $user = User::find(1); // Trova l'utente con ID = 1
                    if ($user) {
                        $user->assignRole($role); // Assegna il ruolo Admin all'utente
                    }
                }
            }
            $this->command->info('Ruoli di default creati');
        } else {
            $this->command->info('Ruoli di default già presenti');
        }
    }
}
