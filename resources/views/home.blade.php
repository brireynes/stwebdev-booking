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


<!-- SERVICES SECTION -->
<div id="services" class="w-full h-[500px] flex items-center bg-white border-b">
    <div class="max-w-7xl mx-auto px-6 w-full grid md:grid-cols-2 gap-8 items-center">

        <div>
            <h2 class="text-3xl font-bold text-yellow-600 mb-4">Services</h2>
            <p class="text-gray-600 mb-6">
                Experience professional haircuts, styling, and treatments tailored just for you.
            </p>
            <a href="{{ route('services.index') }}"
               class="bg-yellow-600 text-white px-6 py-3 rounded-lg hover:bg-yellow-500 transition">
                Explore Services
            </a>
        </div>

        <div class="h-[300px] md:h-full bg-gray-200 rounded-xl flex items-center justify-center">
            <span class="text-gray-500">Service Image</span>
        </div>

    </div>
</div>


<!-- PACKAGES SECTION -->
<div id="packages" class="max-w-7xl mx-auto px-6 py-16">
    <h2 class="text-3xl font-bold text-yellow-600 mb-10 text-center">Packages</h2>

    <div class="grid md:grid-cols-3 gap-6">

        <!-- Basic -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

            <div class="h-56 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500 text-sm">Image</span>
            </div>

            <div class="p-6 flex flex-col flex-1">
                <h2 class="text-xl font-semibold mb-2 text-black">Basic Package</h2>
                <p class="text-gray-600 mb-4">Perfect for small events.</p>
                <p class="text-2xl font-bold text-yellow-600 mb-6">₱2,000</p>

                <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                    Book Now
                </button>
            </div>
        </div>

        <!-- Deluxe -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

            <div class="h-56 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500 text-sm">Image</span>
            </div>

            <div class="p-6 flex flex-col flex-1">
                <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full w-fit mb-2">Popular</span>

                <h2 class="text-xl font-semibold mb-2 text-black">Deluxe Package</h2>
                <p class="text-gray-600 mb-4">Best for medium-sized events.</p>
                <p class="text-2xl font-bold text-yellow-600 mb-6">₱5,000</p>

                <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                    Book Now
                </button>
            </div>
        </div>

        <!-- Prestige -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

            <div class="h-56 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500 text-sm">Image</span>
            </div>

            <div class="p-6 flex flex-col flex-1">
                <h2 class="text-xl font-semibold mb-2 text-black">Prestige Package</h2>
                <p class="text-gray-600 mb-4">Perfect for large events.</p>
                <p class="text-2xl font-bold text-yellow-600 mb-6">₱10,000</p>

                <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                    Book Now
                </button>
            </div>
        </div>

    </div>
</div>


<!-- PROMOS SECTION -->
<div id="promos" class="w-full py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-yellow-600 mb-10 text-center">
            Promos
        </h2>

        <div class="grid md:grid-cols-3 gap-6">

            <!-- Promo 1 -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

                <div class="h-56 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500 text-sm">Image</span>
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full w-fit mb-2">Limited</span>

                    <h2 class="text-xl font-semibold mb-2 text-black">Summer Promo</h2>
                    <p class="text-gray-600 mb-4">Enjoy 20% off on all packages.</p>
                    <p class="text-sm text-gray-500 mb-6">Valid until May 30</p>

                    <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                        Avail Promo
                    </button>
                </div>

            </div>

            <!-- Promo 2 -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

                <div class="h-56 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500 text-sm">Image</span>
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full w-fit mb-2">Hot Deal</span>

                    <h2 class="text-xl font-semibold mb-2 text-black">Weekend Special</h2>
                    <p class="text-gray-600 mb-4">Book on weekends and get free decorations.</p>
                    <p class="text-sm text-gray-500 mb-6">Every Saturday & Sunday</p>

                    <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                        Avail Promo
                    </button>
                </div>

            </div>

            <!-- Promo 3 -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

                <div class="h-56 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500 text-sm">Image</span>
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full w-fit mb-2">Best Value</span>

                    <h2 class="text-xl font-semibold mb-2 text-black">Group Discount</h2>
                    <p class="text-gray-600 mb-4">Get ₱1,000 off for group bookings.</p>
                    <p class="text-sm text-gray-500 mb-6">Minimum of 5 bookings</p>

                    <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                        Avail Promo
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection