<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Juan Perez',
            'email' => 'juan@taller.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Maria Lopez',
            'email' => 'maria@taller.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
