<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
