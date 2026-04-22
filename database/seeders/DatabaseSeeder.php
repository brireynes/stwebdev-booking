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
        // Create Super Admin (only in database)
        User::firstOrCreate(
            ['email' => 'test1@2'],
            [
                'name' => 'Super Admin',
                'email' => 'test1@2',
                'password' => Hash::make('123'),
                'role' => 'super_admin',
            ]
        );

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([ServiceSeeder::class]);
    }
}
