<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            // SERVICES
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
            [
                'name' => 'Anti Frizz Brazilian Blow Dry Treatment with Haircut',
                'description' => 'Anti frizz Brazilian blow dry treatment at any length, including a haircut for sleek results.',
                'price' => 800,
                'duration' => 120,
                'type' => 'service',
            ],
            [
                'name' => 'Anti Frizz Brazilian Blow Dry Treatment with Hair Color and Haircut',
                'description' => 'Anti frizz Brazilian blow dry with hair color and haircut for smooth, vibrant hair.',
                'price' => 1300,
                'duration' => 150,
                'type' => 'service',
            ],
            [
                'name' => 'Anti Frizz Brazilian Blow Dry with Hair Color, Partial Highlights, Haircut, Manicure & Pedicure',
                'description' => 'Complete treatment with partial highlights, haircut, free manicure, and pedicure.',
                'price' => 2500,
                'duration' => 210,
                'type' => 'service',
            ],
            [
                'name' => 'Anti Frizz Brazilian Blow Dry with Hair Color, Full Highlights, Haircut, Foot Scrub, Manicure & Pedicure',
                'description' => 'Premium treatment with full highlights, haircut, foot scrub, manicure, and pedicure.',
                'price' => 3500,
                'duration' => 240,
                'type' => 'service',
            ],
            [
                'name' => 'Deorebiss Protein Straightbond',
                'description' => 'Protein straightbond treatment using Deorebiss protein for stronger, smoother hair.',
                'price' => 3000,
                'duration' => 180,
                'type' => 'service',
            ],
            [
                'name' => 'Naturelle Royal Blend Straightbond',
                'description' => 'Protein straightbond treatment with Naturelle Royal Blend for added shine and smoothness.',
                'price' => 3500,
                'duration' => 180,
                'type' => 'service',
            ],
            [
                'name' => 'Naturelle Royal Diamond Straightbond',
                'description' => 'Premium Naturelle Royal Diamond straightbond treatment for high-impact shine.',
                'price' => 4000,
                'duration' => 200,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Rebond with Hair Cellophane, Free Manicure or Pedicure, Free Haircut',
                'description' => 'Hair rebonding with cellophane plus a free haircut and optional manicure or pedicure.',
                'price' => 1500,
                'duration' => 180,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Rebond with Hair Color, Free Manicure or Pedicure, Free Haircut',
                'description' => 'Hair rebonding with color and complimentary manicure or pedicure and haircut.',
                'price' => 2000,
                'duration' => 200,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Rebond with Advance Keratin Treatment, Free Manicure & Pedicure, Free Haircut',
                'description' => 'Advanced keratin hair rebond with manicure, pedicure, and haircut included.',
                'price' => 2500,
                'duration' => 220,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Rebond with Cysteine Treatment, Free Manicure & Pedicure, Free Haircut',
                'description' => 'Cysteine rebonding plus full salon pampering and haircut.',
                'price' => 3000,
                'duration' => 240,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Color with Hot Oil Treatment and Free Haircut',
                'description' => 'Hair color services with hot oil treatment and free haircut at any length.',
                'price' => 800,
                'duration' => 150,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Color with Hair Spa Treatment and Free Haircut',
                'description' => 'Hair color with nourishing hair spa and a complimentary haircut.',
                'price' => 1000,
                'duration' => 170,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Color with Hair Cellophane and Free Haircut',
                'description' => 'Hair coloring with cellophane finish and a free haircut.',
                'price' => 1200,
                'duration' => 170,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Color with Anti-Frizz Brazilian Blow Dry, Free Manicure or Pedicure',
                'description' => 'Color service combined with anti-frizz Brazilian blow dry and optional manicure or pedicure.',
                'price' => 1500,
                'duration' => 180,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Color with Hair Botox Treatment and Free Manicure or Pedicure',
                'description' => 'Color and hair botox treatment plus manicure or pedicure.',
                'price' => 2000,
                'duration' => 190,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Color with Advance Keratin Treatment and Free Manicure & Pedicure',
                'description' => 'Color, keratin, manicure, and pedicure bundled for healthy, glossy hair.',
                'price' => 2500,
                'duration' => 210,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Color with Cysteine Treatment and Free Manicure & Pedicure',
                'description' => 'Cysteine color treatment with manicure and pedicure included.',
                'price' => 3000,
                'duration' => 220,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Color with Partial Highlights, Free Manicure or Pedicure',
                'description' => 'Partial highlights and color service with free manicure or pedicure.',
                'price' => 2000,
                'duration' => 190,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Color with Full Highlights, Free Manicure & Pedicure',
                'description' => 'Full highlights with color plus manicure and pedicure.',
                'price' => 3000,
                'duration' => 210,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Color with Balayage, Free Haircut, Foot Scrub, Free Manicure & Pedicure',
                'description' => 'Balayage, haircut, foot scrub, manicure, and pedicure for a total salon experience.',
                'price' => 4000,
                'duration' => 240,
                'type' => 'service',
            ],
            [
                'name' => 'Hot Oil Treatment with Manicure & Pedicure',
                'description' => 'Hot oil treatment at any length with manicure and pedicure included.',
                'price' => 350,
                'duration' => 120,
                'type' => 'service',
            ],
            [
                'name' => 'Hot Oil Treatment with Foot Scrub, Manicure & Pedicure',
                'description' => 'Hot oil treatment with foot scrub, manicure, and pedicure.',
                'price' => 500,
                'duration' => 140,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Spa Treatment with Manicure & Pedicure',
                'description' => 'Hair spa treatment plus manicure and pedicure for complete care.',
                'price' => 450,
                'duration' => 130,
                'type' => 'service',
            ],
            [
                'name' => 'Hair Spa Treatment with Foot Scrub, Manicure & Pedicure',
                'description' => 'Hair spa treatment with foot scrub and full nail care.',
                'price' => 600,
                'duration' => 150,
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

        foreach ($services as $item) {
            Service::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}