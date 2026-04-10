<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Haircut & Styling',
                'description' => 'Professional haircut with styling tailored to your look.',
                'price' => 350.00,
            ],
            [
                'name' => 'Full Body Massage',
                'description' => 'Relaxing therapeutic massage to relieve tension and stress.',
                'price' => 550.00,
            ],
            [
                'name' => 'Facial Glow Treatment',
                'description' => 'Brightening facial treatment for fresh, glowing skin.',
                'price' => 650.00,
            ],
            [
                'name' => 'Nail Care Package',
                'description' => 'Complete manicure and pedicure package for polished nails.',
                'price' => 420.00,
            ],
            [
                'name' => 'Couples Spa Experience',
                'description' => 'Shared spa session with pampering services for two.',
                'price' => 1_200.00,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
