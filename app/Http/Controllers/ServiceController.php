<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        if ($services->isEmpty()) {
            $defaultServices = $this->defaultServices();

            foreach ($defaultServices as &$service) {
                $service['created_at'] = now();
                $service['updated_at'] = now();
            }

            Service::insert($defaultServices);
            $services = Service::all();
        }

        $packages = [
            [
                'title' => 'Basic Package',
                'tag' => 'Starter',
                'description' => 'Perfect for quick styling and touch-ups, this package covers essential salon services.',
                'price' => '₱2,000',
                'items' => [
                    'Basic hair styling',
                    'Scalp treatment',
                    'Complimentary hair wash',
                ],
            ],
            [
                'title' => 'Deluxe Package',
                'tag' => 'Popular',
                'description' => 'A fuller salon experience with added pampering and finishing touches.',
                'price' => '₱5,000',
                'items' => [
                    'Premium cut and style',
                    'Deep conditioning',
                    'Shampoo and blow dry',
                    'Complimentary styling product',
                ],
            ],
            [
                'title' => 'Prestige Package',
                'tag' => 'Premium',
                'description' => 'Our top-tier package for complete salon treatment and event-ready grooming.',
                'price' => '₱10,000',
                'items' => [
                    'Full salon makeover',
                    'Luxury treatment',
                    'Extended styling session',
                    'Priority booking',
                ],
            ],
        ];

        $promos = [
            [
                'label' => 'Limited',
                'title' => 'Summer Special',
                'description' => 'Get 20% off selected services during this season.',
                'duration' => 'Ends May 30',
            ],
            [
                'label' => 'Hot Deal',
                'title' => 'Weekend Glow',
                'description' => 'Book on weekends and receive a free styling consultation.',
                'duration' => 'Sat - Sun',
            ],
            [
                'label' => 'Best Value',
                'title' => 'Group Savings',
                'description' => 'Save ₱1,000 when booking 5 or more services together.',
                'duration' => 'Until supplies last',
            ],
        ];

        return view('services', compact('services', 'packages', 'promos'));
    }

    private function defaultServices()
    {
        return [
            [
                'name' => 'Haircut',
                'description' => 'A clean and professional haircut to refresh your style.',
                'price' => 100,
                'duration' => 30,
            ],
            [
                'name' => 'Manicure',
                'description' => 'Basic manicure for neat and polished nails.',
                'price' => 100,
                'duration' => 45,
            ],
            [
                'name' => 'Pedicure',
                'description' => 'Basic pedicure for soft and healthy feet.',
                'price' => 100,
                'duration' => 45,
            ],
            [
                'name' => 'Anti Frizz Brazilian Blow Dry Treatment with Haircut',
                'description' => 'Anti frizz Brazilian blow dry treatment at any length, including a haircut for sleek results.',
                'price' => 800,
                'duration' => 120,
            ],
            [
                'name' => 'Anti Frizz Brazilian Blow Dry Treatment with Hair Color and Haircut',
                'description' => 'Anti frizz Brazilian blow dry with hair color and haircut for smooth, vibrant hair.',
                'price' => 1300,
                'duration' => 150,
            ],
            [
                'name' => 'Anti Frizz Brazilian Blow Dry with Hair Color, Partial Highlights, Haircut, Manicure & Pedicure',
                'description' => 'Complete treatment with partial highlights, haircut, free manicure, and pedicure.',
                'price' => 2500,
                'duration' => 210,
            ],
            [
                'name' => 'Anti Frizz Brazilian Blow Dry with Hair Color, Full Highlights, Haircut, Foot Scrub, Manicure & Pedicure',
                'description' => 'Premium treatment with full highlights, haircut, foot scrub, manicure, and pedicure.',
                'price' => 3500,
                'duration' => 240,
            ],
            [
                'name' => 'Deorebiss Protein Straightbond',
                'description' => 'Protein straightbond treatment using Deorebiss protein for stronger, smoother hair.',
                'price' => 3000,
                'duration' => 180,
            ],
            [
                'name' => 'Naturelle Royal Blend Straightbond',
                'description' => 'Protein straightbond treatment with Naturelle Royal Blend for added shine and smoothness.',
                'price' => 3500,
                'duration' => 180,
            ],
            [
                'name' => 'Naturelle Royal Diamond Straightbond',
                'description' => 'Premium Naturelle Royal Diamond straightbond treatment for high-impact shine.',
                'price' => 4000,
                'duration' => 200,
            ],
            [
                'name' => 'Hair Rebond with Hair Cellophane, Free Manicure or Pedicure, Free Haircut',
                'description' => 'Hair rebonding with cellophane plus a free haircut and optional manicure or pedicure.',
                'price' => 1500,
                'duration' => 180,
            ],
            [
                'name' => 'Hair Rebond with Hair Color, Free Manicure or Pedicure, Free Haircut',
                'description' => 'Hair rebonding with color and complimentary manicure or pedicure and haircut.',
                'price' => 2000,
                'duration' => 200,
            ],
            [
                'name' => 'Hair Rebond with Advance Keratin Treatment, Free Manicure & Pedicure, Free Haircut',
                'description' => 'Advanced keratin hair rebond with manicure, pedicure, and haircut included.',
                'price' => 2500,
                'duration' => 220,
            ],
            [
                'name' => 'Hair Rebond with Cysteine Treatment, Free Manicure & Pedicure, Free Haircut',
                'description' => 'Cysteine rebonding plus full salon pampering and haircut.',
                'price' => 3000,
                'duration' => 240,
            ],
            [
                'name' => 'Hair Color with Hot Oil Treatment and Free Haircut',
                'description' => 'Hair color services with hot oil treatment and free haircut at any length.',
                'price' => 800,
                'duration' => 150,
            ],
            [
                'name' => 'Hair Color with Hair Spa Treatment and Free Haircut',
                'description' => 'Hair color with nourishing hair spa and a complimentary haircut.',
                'price' => 1000,
                'duration' => 170,
            ],
            [
                'name' => 'Hair Color with Hair Cellophane and Free Haircut',
                'description' => 'Hair coloring with cellophane finish and a free haircut.',
                'price' => 1200,
                'duration' => 170,
            ],
            [
                'name' => 'Hair Color with Anti-Frizz Brazilian Blow Dry, Free Manicure or Pedicure',
                'description' => 'Color service combined with anti-frizz Brazilian blow dry and optional manicure or pedicure.',
                'price' => 1500,
                'duration' => 180,
            ],
            [
                'name' => 'Hair Color with Hair Botox Treatment and Free Manicure or Pedicure',
                'description' => 'Color and hair botox treatment plus manicure or pedicure.',
                'price' => 2000,
                'duration' => 190,
            ],
            [
                'name' => 'Hair Color with Advance Keratin Treatment and Free Manicure & Pedicure',
                'description' => 'Color, keratin, manicure, and pedicure bundled for healthy, glossy hair.',
                'price' => 2500,
                'duration' => 210,
            ],
            [
                'name' => 'Hair Color with Cysteine Treatment and Free Manicure & Pedicure',
                'description' => 'Cysteine color treatment with manicure and pedicure included.',
                'price' => 3000,
                'duration' => 220,
            ],
            [
                'name' => 'Hair Color with Partial Highlights, Free Manicure or Pedicure',
                'description' => 'Partial highlights and color service with free manicure or pedicure.',
                'price' => 2000,
                'duration' => 190,
            ],
            [
                'name' => 'Hair Color with Full Highlights, Free Manicure & Pedicure',
                'description' => 'Full highlights with color plus manicure and pedicure.',
                'price' => 3000,
                'duration' => 210,
            ],
            [
                'name' => 'Hair Color with Balayage, Free Haircut, Foot Scrub, Free Manicure & Pedicure',
                'description' => 'Balayage, haircut, foot scrub, manicure, and pedicure for a total salon experience.',
                'price' => 4000,
                'duration' => 240,
            ],
            [
                'name' => 'Hot Oil Treatment with Manicure & Pedicure',
                'description' => 'Hot oil treatment at any length with manicure and pedicure included.',
                'price' => 350,
                'duration' => 120,
            ],
            [
                'name' => 'Hot Oil Treatment with Foot Scrub, Manicure & Pedicure',
                'description' => 'Hot oil treatment with foot scrub, manicure, and pedicure.',
                'price' => 500,
                'duration' => 140,
            ],
            [
                'name' => 'Hair Spa Treatment with Manicure & Pedicure',
                'description' => 'Hair spa treatment plus manicure and pedicure for complete care.',
                'price' => 450,
                'duration' => 130,
            ],
            [
                'name' => 'Hair Spa Treatment with Foot Scrub, Manicure & Pedicure',
                'description' => 'Hair spa treatment with foot scrub and full nail care.',
                'price' => 600,
                'duration' => 150,
            ],
        ];
    }

    public function show(Service $service)
    {
        return view('service', compact('service'));
    }

    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        $service = Service::findOrFail($validated['service_id']);

        $cart = session('cart', []);

        if (! collect($cart)->first(fn ($item) => $item['service_id'] === $service->id)) {
            $cart[] = [
                'service_id' => $service->id,
                'name' => $service->name,
                'price' => $service->price,
                'duration' => $service->duration,
            ];

            session(['cart' => $cart]);
        }

        return back()->with('success', "{$service->name} added to cart.");
    }
}
