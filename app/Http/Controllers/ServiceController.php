<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('type', 'service')->get();
        $packages = Service::where('type', 'package')->get();
        $promos = Service::where('type', 'promo')->get();

        return view('services', compact('services', 'packages', 'promos'));
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