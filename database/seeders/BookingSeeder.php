<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample users
        $user1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $user2 = User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
        ]);

        $user3 = User::create([
            'name' => 'Bob Wilson',
            'email' => 'bob@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create sample bookings
        Booking::create([
            'user_id' => $user1->id,
            'service' => 'Haircut',
            'appointment_date' => '2026-04-15',
            'appointment_time' => '10:00',
            'status' => 'pending',
        ]);

        Booking::create([
            'user_id' => $user1->id,
            'service' => 'Beard Trim',
            'appointment_date' => '2026-04-20',
            'appointment_time' => '14:30',
            'status' => 'approved',
        ]);

        Booking::create([
            'user_id' => $user2->id,
            'service' => 'Spa Treatment',
            'appointment_date' => '2026-04-18',
            'appointment_time' => '11:00',
            'status' => 'pending',
        ]);

        Booking::create([
            'user_id' => $user2->id,
            'service' => 'Massage',
            'appointment_date' => '2026-04-10',
            'appointment_time' => '15:00',
            'status' => 'rejected',
            'notes' => 'Cancelled by customer',
        ]);

        Booking::create([
            'user_id' => $user3->id,
            'service' => 'Haircut',
            'appointment_date' => '2026-04-25',
            'appointment_time' => '09:30',
            'status' => 'pending',
        ]);
    }
}
