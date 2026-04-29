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
<section class="w-full bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">
            <span class="inline-block text-sm uppercase tracking-[0.35em] text-yellow-600 mb-3">
                Curated Salon Collection
            </span>

            <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">
                Choose Your Signature Experience
            </h2>

            <p class="text-gray-600 max-w-2xl mx-auto">
                Explore our premium services, exclusive packages, and limited promos crafted for a classy salon experience.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <!-- Services -->
            <a href="{{ route('services.index') }}#services"
               class="group block overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm hover:shadow-xl transition">

                <div class="h-72 bg-cover bg-center transition duration-500 group-hover:scale-105"
                     style="background-image: url('/images/services.jpg');">
                    <div class="h-full w-full bg-black/20"></div>
                </div>

                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-black mb-2 group-hover:text-yellow-600 transition">
                        Services
                    </h3>

                    <p class="text-gray-600 text-sm mb-4">
                        Premium hair, nail, and beauty treatments.
                    </p>

                    <span class="text-yellow-600 font-semibold">
                        View Services →
                    </span>
                </div>
            </a>

            <!-- Packages -->
            <a href="{{ route('services.index') }}#packages"
               class="group block overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm hover:shadow-xl transition">

                <div class="h-72 bg-cover bg-center transition duration-500 group-hover:scale-105"
                     style="background-image: url('/images/packages.jpg');">
                    <div class="h-full w-full bg-black/20"></div>
                </div>

                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-black mb-2 group-hover:text-yellow-600 transition">
                        Packages
                    </h3>

                    <p class="text-gray-600 text-sm mb-4">
                        Complete salon bundles for a refined transformation.
                    </p>

                    <span class="text-yellow-600 font-semibold">
                        View Packages →
                    </span>
                </div>
            </a>

            <!-- Promos -->
            <a href="{{ route('services.index') }}#promos"
               class="group block overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm hover:shadow-xl transition">

                <div class="h-72 bg-cover bg-center transition duration-500 group-hover:scale-105"
                     style="background-image: url('/images/promos.jpg');">
                    <div class="h-full w-full bg-black/20"></div>
                </div>

                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-black mb-2 group-hover:text-yellow-600 transition">
                        Promos
                    </h3>

                    <p class="text-gray-600 text-sm mb-4">
                        Special offers and limited salon deals.
                    </p>

                    <span class="text-yellow-600 font-semibold">
                        View Promos →
                    </span>
                </div>
            </a>

        </div>

    </div>
</section>
<!-- CTA BANNER -->
<section class="w-full bg-black">
    <div class="relative max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-10">

        <!-- Image -->
        <div class="w-full md:w-1/2">
            <img src="{{ asset('images/cta-banner.jpg') }}"
                 alt="Salon Experience"
                 class="w-full rounded-3xl shadow-lg object-cover">
        </div>

        <!-- Text -->
        <div class="w-full md:w-1/2 text-center md:text-left">

            <span class="inline-block text-sm uppercase tracking-[0.35em] text-yellow-500 mb-4">
                Luxury Experience
            </span>

            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6 leading-tight">
                Begin Your<br>
                Signature Look
            </h2>

            <p class="text-gray-400 mb-8">
                Step into elegance and let our expert stylists bring out your best look with premium salon care.
            </p>

            <a href="{{ route('services.index') }}"
               class="inline-block bg-yellow-500 text-black px-8 py-3 rounded-full font-semibold hover:bg-yellow-400 transition">
                Explore Services
            </a>

        </div>

    </div>
</section>
@endsection