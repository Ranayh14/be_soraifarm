<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            // Check if admin already exists to prevent duplication error
            if (!User::where('email', 'admin@soraifarm.com')->exists()) {
                User::create([
                    'nama_lengkap' => 'Admin Soraim',
                    'email' => 'admin@soraifarm.com',
                    'password' => Hash::make('password'),
                    'role' => 'admin',
                ]);
                $this->command->info('Admin user created successfully.');
            } else {
                $this->command->info('Admin user already exists.');
            }
        } catch (\Exception $e) {
            Log::error('Failed to create admin: ' . $e->getMessage());
        }
    }
}
