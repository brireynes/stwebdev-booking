<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('name')->get();

        $packages = [
            [
                'title' => 'Starter Package',
                'subtitle' => 'Perfect for first-time visitors',
                'description' => 'One service plus consultation and express care.',
                'price' => '₱999',
            ],
            [
                'title' => 'Premium Package',
                'subtitle' => 'Relax and restore package',
                'description' => 'Two services with extended care & styling.',
                'price' => '₱1,699',
            ],
            [
                'title' => 'Ultimate Package',
                'subtitle' => 'Best value bundle',
                'description' => 'Three services with luxury treatment upgrades.',
                'price' => '₱2,499',
            ],
        ];

        $promos = [
            [
                'title' => 'Summer Promo',
                'description' => 'Get 20% off all spa services when you book this month.',
            ],
            [
                'title' => 'Book 2, Save More',
                'description' => 'Reserve two services and receive a free add-on treatment.',
            ],
            [
                'title' => 'Weekend Relaxation',
                'description' => 'Special weekend pricing for early appointments.',
            ],
        ];

        return view('services', compact('services', 'packages', 'promos'));
    }

    public function show(Service $service): View
    {
        return view('service-details', ['service' => $service]);
    }
}
