<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Super Admin (highest role)
        User::firstOrCreate(
            ['email' => 'test1@2'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('123'),
                'role' => 'super_admin',
            ]
        );

        // ✅ Normal Admin (optional extra admin account)
        User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('123'),
                'role' => 'admin',
            ]
        );

        // ✅ Regular Test User
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('123456'),
                'role' => 'user',
            ]
        );

        // ✅ Seed services
        $this->call([
            ServiceSeeder::class,
        ]);
    }
}