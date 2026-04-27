<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [

            // ================= SERVICES =================
            [
                'name' => 'Haircut',
                'description' => 'A clean and professional haircut to refresh your style.',
                'price' => 100,
                'duration' => 30,
                'type' => 'service',
            ],
            [
                'name' => 'Manicure',
                'description' => 'Basic manicure for neat and polished nails.',
                'price' => 100,
                'duration' => 45,
                'type' => 'service',
            ],
            [
                'name' => 'Pedicure',
                'description' => 'Basic pedicure for soft and healthy feet.',
                'price' => 100,
                'duration' => 45,
                'type' => 'service',
            ],

            // PACKAGES
            [
                'name' => 'Basic Package',
                'description' => 'Perfect for small events.',
                'price' => 2000,
                'duration' => 120,
                'type' => 'package',
            ],
            [
                'name' => 'Deluxe Package',
                'description' => 'Best for medium-sized events.',
                'price' => 5000,
                'duration' => 180,
                'type' => 'package',
            ],
            [
                'name' => 'Prestige Package',
                'description' => 'Perfect for large events.',
                'price' => 10000,
                'duration' => 240,
                'type' => 'package',
            ],
            
            // PROMOS
            [
                'name' => 'New Client Haircut Promo',
                'description' => 'For new clients: Get 50% OFF on Haircut (original ₱100 → promo ₱50 only).',
                'price' => 50,
                'duration' => 30,
                'type' => 'promo',
            ],
            [
                'name' => 'Weekend Manicure & Pedicure Deal',
                'description' => 'Weekend special: Get Manicure or Pedicure for only ₱50 each.',
                'price' => 50,
                'duration' => 45,
                'type' => 'promo',
            ],
            [
                'name' => 'Student Nail Care Discount',
                'description' => 'Students get discounted Manicure or Pedicure for only ₱50. Valid student ID required.',
                'price' => 50,
                'duration' => 45,
                'type' => 'promo',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['name' => $service['name']],
                $service
            );
        }
    }
}