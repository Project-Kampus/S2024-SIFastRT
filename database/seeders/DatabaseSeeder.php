<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Pak RT',
            'email' => 'pakrt@gmail.com',
            'password' => bcrypt('pakrt12345'),
            'role' => 'admin',
            'email_verified_at' => now(),
            'is_verified' => true,
        ]);
        User::create([
            'name' => 'saya',
            'email' => 'saya@gmail.com',
            'password' => bcrypt('saya12345'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'saya2',
            'email' => 'saya2@gmail.com',
            'password' => bcrypt('saya12345'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'saya3',
            'email' => 'saya3@gmail.com',
            'password' => bcrypt('saya12345'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
