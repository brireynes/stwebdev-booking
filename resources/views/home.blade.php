@extends('layouts.app')

@section('content')

<!-- HERO BANNER -->
<div id="home" class="w-full h-[500px] bg-cover bg-center flex items-center"
     style="background-image: url('/images/salon-banner.jpg');">

    <div class="w-full h-full bg-black/50 flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Welcome to Bong's Salon
            </h1>
            <p class="text-lg md:text-xl mb-6 text-gray-200">
                Experience premium beauty services with comfort and style
            </p>
            <a href="{{ route('bookings.index') }}"
               class="bg-yellow-600 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-500 transition">
                Book Now
            </a>
        </div>
    </div>
</div>

<!-- CATEGORIES SECTION -->
<div class="w-full bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-yellow-600 mb-3">
                Explore Bong's Salon
            </h2>
            <p class="text-gray-600">
                Browse our services, packages, and promos in one place.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <!-- Services -->
            <a href="{{ route('services.index') }}#services"
               class="group bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden hover:shadow-lg transition">

                <div class="h-56 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500 text-sm">Services Image</span>
                </div>

                <div class="p-6">
                    <h3 class="text-xl font-semibold text-black mb-2 group-hover:text-yellow-600 transition">
                        Services
                    </h3>
                    <p class="text-gray-600 mb-5">
                        View all salon services including hair, nails, and beauty treatments.
                    </p>
                    <span class="inline-block bg-yellow-600 text-white px-5 py-2 rounded-lg group-hover:bg-yellow-700 transition">
                        Explore Services
                    </span>
                </div>
            </a>

            <!-- Packages -->
            <a href="{{ route('services.index') }}#packages"
               class="group bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden hover:shadow-lg transition">

                <div class="h-56 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500 text-sm">Packages Image</span>
                </div>

                <div class="p-6">
                    <h3 class="text-xl font-semibold text-black mb-2 group-hover:text-yellow-600 transition">
                        Packages
                    </h3>
                    <p class="text-gray-600 mb-5">
                        Check bundled salon offers and complete beauty packages.
                    </p>
                    <span class="inline-block bg-yellow-600 text-white px-5 py-2 rounded-lg group-hover:bg-yellow-700 transition">
                        Explore Packages
                    </span>
                </div>
            </a>

            <!-- Promos -->
            <a href="{{ route('services.index') }}#promos"
               class="group bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden hover:shadow-lg transition">

                <div class="h-56 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500 text-sm">Promos Image</span>
                </div>

                <div class="p-6">
                    <h3 class="text-xl font-semibold text-black mb-2 group-hover:text-yellow-600 transition">
                        Promos
                    </h3>
                    <p class="text-gray-600 mb-5">
                        See current discounts, limited offers, and special deals.
                    </p>
                    <span class="inline-block bg-yellow-600 text-white px-5 py-2 rounded-lg group-hover:bg-yellow-700 transition">
                        Explore Promos
                    </span>
                </div>
            </a>

        </div>

    </div>
</div>

@endsection