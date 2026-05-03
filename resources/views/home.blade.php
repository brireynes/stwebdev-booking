@extends('layouts.app')

@section('content')

@php
    $heroImage = $homepageImages['hero_banner']->image ?? null;
    $servicesImage = $homepageImages['services_card']->image ?? null;
    $packagesImage = $homepageImages['packages_card']->image ?? null;
    $promosImage = $homepageImages['promos_card']->image ?? null;
    $ctaImage = $homepageImages['cta_banner']->image ?? null;
@endphp

<!-- HERO BANNER -->
<section id="home"
    class="relative w-full min-h-[650px] bg-cover bg-center flex items-center"
    style="background-image: url('{{ $heroImage ? asset($heroImage) : asset('images/salon-banner.jpg') }}');">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-white">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">
            Welcome to Bong's Salon
        </h1>

        <p class="text-lg md:text-xl mb-8 text-gray-200 max-w-2xl">
            Experience premium beauty services with comfort and style
        </p>

        <a href="{{ route('services.index') }}"
           class="inline-block bg-yellow-500 text-black px-8 py-3 rounded-full font-semibold hover:bg-yellow-400 transition">
            Book Now
        </a>
    </div>
</section>

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

                @if($servicesImage)
                    <img src="{{ asset($servicesImage) }}"
                         alt="Services"
                         class="w-full h-72 object-cover transition duration-500 group-hover:scale-105">
                @else
                    <div class="w-full h-72 bg-gray-100 flex items-center justify-center text-gray-400">
                        No image
                    </div>
                @endif

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

                @if($packagesImage)
                    <img src="{{ asset($packagesImage) }}"
                         alt="Packages"
                         class="w-full h-72 object-cover transition duration-500 group-hover:scale-105">
                @else
                    <div class="w-full h-72 bg-gray-100 flex items-center justify-center text-gray-400">
                        No image
                    </div>
                @endif

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

                @if($promosImage)
                    <img src="{{ asset($promosImage) }}"
                         alt="Promos"
                         class="w-full h-72 object-cover transition duration-500 group-hover:scale-105">
                @else
                    <div class="w-full h-72 bg-gray-100 flex items-center justify-center text-gray-400">
                        No image
                    </div>
                @endif

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

<!-- TESTIMONIALS SECTION -->
<section class="w-full bg-[#f8f5ef] py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">
            <span class="inline-block text-sm uppercase tracking-[0.35em] text-yellow-600 mb-3">
                Client Experience
            </span>

            <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">
                What Our Clients Say
            </h2>

            <p class="text-gray-600 max-w-2xl mx-auto">
                Trusted by clients who love elegant beauty care, relaxing service, and polished results.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-xl transition">
                <div class="text-yellow-500 text-lg mb-4">★★★★★</div>

                <p class="text-gray-600 leading-relaxed mb-6">
                    “The service was relaxing and professional. My hair looked fresh, smooth, and beautifully styled.”
                </p>

                <h3 class="font-bold text-black">Maria Santos</h3>
                <p class="text-sm text-gray-500">Hair Rebond Client</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-xl transition">
                <div class="text-yellow-500 text-lg mb-4">★★★★★</div>

                <p class="text-gray-600 leading-relaxed mb-6">
                    “Bong's Salon gave me a complete glow-up. The staff were kind, careful, and very accommodating.”
                </p>

                <h3 class="font-bold text-black">Angela Reyes</h3>
                <p class="text-sm text-gray-500">Hair Color Client</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-xl transition">
                <div class="text-yellow-500 text-lg mb-4">★★★★★</div>

                <p class="text-gray-600 leading-relaxed mb-6">
                    “The salon feels clean, elegant, and comfortable. I loved the final result and would come back again.”
                </p>

                <h3 class="font-bold text-black">Camille Dela Cruz</h3>
                <p class="text-sm text-gray-500">Salon Package Client</p>
            </div>

        </div>
    </div>
</section>

<!-- FEATURED SERVICES SECTION -->
<section class="w-full bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">
            <span class="inline-block text-sm uppercase tracking-[0.35em] text-yellow-600 mb-3">
                Featured Services
            </span>

            <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">
                Our Most Loved Salon Treatments
            </h2>

            <p class="text-gray-600 max-w-2xl mx-auto">
                Discover client-favorite services selected by Bong's Salon.
            </p>
        </div>

        @if($featuredServices->count())
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredServices as $item)
                    @include('partials.service-card', ['item' => $item])
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-500">
                No featured services available.
            </div>
        @endif

        <div class="text-center mt-12">
            <a href="{{ route('services.index') }}"
               class="inline-block bg-black text-white px-8 py-3 rounded-full font-semibold hover:bg-gray-800 transition">
                View All Services
            </a>
        </div>
    </div>
</section>

<!-- CTA BANNER -->
<section class="relative w-full min-h-[450px] bg-cover bg-center flex items-center"
    style="background-image: url('{{ $ctaImage ? asset($ctaImage) : asset('images/home-cta.png') }}');">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-white text-center">
        <h2 class="text-3xl md:text-5xl font-bold mb-4">
            Ready for Your Salon Glow-Up?
        </h2>

        <p class="text-lg md:text-xl mb-8 text-gray-200 max-w-2xl mx-auto">
            Book your appointment today and experience the Bong's Salon difference.
        </p>

        <a href="{{ route('services.index') }}"
           class="inline-block bg-yellow-500 text-black px-8 py-3 rounded-full font-semibold hover:bg-yellow-400 transition">
            Book Now
        </a>
    </div>
</section>

@endsection