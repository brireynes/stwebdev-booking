@extends('layouts.app')

@section('content')

<script>
function handleBooking(event, serviceId) {
    const isLoggedIn = @json(auth()->check());

    if (!isLoggedIn) {
        event.preventDefault();

        // show overlay
        document.getElementById('loginOverlay').classList.remove('hidden');

        // block background scroll + interaction
        document.body.style.overflow = 'hidden';

        return false;
    }

    // proceed if logged in
    window.location.href = `/booking/${serviceId}`;
}

function closeOverlay() {
    document.getElementById('loginOverlay').classList.add('hidden');
    document.body.style.overflow = 'auto';
}
</script>

<div class="bg-gray-50 text-on-surface">
    <div class="max-w-7xl mx-auto px-6 py-16">

        <!-- Header -->
        <div class="text-center mb-14">
            <span class="inline-block text-sm uppercase tracking-[0.35em] text-primary mb-3">
                Our Services
            </span>
            <h1 class="text-5xl font-bold tracking-tight text-black">
                Choose the perfect salon service
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-on-surface-variant">
                Browse our service collection, view details, and book instantly.
            </p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="max-w-3xl mx-auto mb-8 rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif
<!-- Services Grid -->

@php
    $grouped = $services->groupBy('type');
    $promos = $grouped['promo'] ?? collect();
@endphp

@foreach($grouped as $type => $items)

    @if($type !== 'promo')

        <!-- SECTION TITLE (Packages + Services only) -->
        <div class="mb-8 mt-12">
            <h2 class="text-2xl font-bold text-gray-900 capitalize">
                {{ $type === 'package' ? 'Packages' : 'Services' }}
            </h2>

            <p class="text-sm text-gray-500">
                {{ $type === 'package'
                    ? 'Choose your perfect package'
                    : 'Browse available salon services'
                }}
            </p>
        </div>

        <!-- GRID -->
        <div class="grid gap-8 lg:grid-cols-3 mb-12">

            @foreach($items as $service)
                <article class="flex flex-col justify-between h-full rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition">

                    <!-- Image -->
                    <div class="mb-5">
                        <img src="https://via.placeholder.com/600x400?text=Service+Image"
                             class="w-full h-48 object-cover rounded-xl border">
                    </div>

                    <!-- Content -->
                    <div class="flex-1">

                        <span class="inline-block text-xs {{ $type === 'package' ? 'bg-yellow-500 text-white' : 'bg-gray-200 text-gray-700' }} px-3 py-1 rounded-full mb-2">
                            {{ ucfirst($type) }}
                        </span>

                        <h2 class="text-xl font-semibold text-gray-900 mb-2">
                            {{ $service->name }}
                        </h2>

                        <p class="text-gray-500 text-sm mb-5">
                            {{ \Illuminate\Support\Str::limit($service->description, 120) }}
                        </p>

                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <span class="text-xs text-gray-400 uppercase">Price</span>
                                <p class="text-lg font-bold text-gray-900">
                                    ₱{{ number_format($service->price, 2) }}
                                </p>
                            </div>

                            <span class="text-xs bg-gray-100 px-3 py-1 rounded-full text-gray-600">
                                {{ $service->duration }} mins
                            </span>
                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="mt-auto">
                        <a href="{{ route('booking.create', $service->id) }}"
                           onclick="return handleBooking(event, {{ $service->id }})"
                           class="block w-full rounded-xl bg-yellow-500 px-5 py-3 text-center font-semibold text-white hover:bg-yellow-600 transition">
                            Book Now
                        </a>
                    </div>

                </article>
            @endforeach

        </div>

    @endif

@endforeach


{{-- ========================= --}}
{{-- 🎉 PROMOS SECTION --}}
{{-- ========================= --}}

@if($promos->count())

    <div class="mb-8 mt-16">
        <h2 class="text-2xl font-bold text-gray-900">
            Promos
        </h2>

        <p class="text-sm text-gray-500">
            Special discounted offers for limited time
        </p>
    </div>

    <div class="grid gap-8 lg:grid-cols-3 mb-12">

        @foreach($promos as $service)
            <article class="flex flex-col justify-between h-full rounded-2xl border border-yellow-200 bg-yellow-50 p-6 shadow-sm hover:shadow-md transition">

                <span class="inline-block text-xs bg-yellow-500 text-white px-3 py-1 rounded-full mb-3 w-fit">
                    Promo
                </span>

                <h2 class="text-xl font-semibold text-gray-900 mb-2">
                    {{ $service->name }}
                </h2>

                <p class="text-gray-600 text-sm mb-5">
                    {{ \Illuminate\Support\Str::limit($service->description, 120) }}
                </p>

                <div class="flex justify-between items-center mb-6">
                    <div>
                        <span class="text-xs text-gray-400 uppercase">Promo Price</span>
                        <p class="text-lg font-bold text-yellow-600">
                            ₱{{ number_format($service->price, 2) }}
                        </p>
                    </div>

                    <span class="text-xs bg-white px-3 py-1 rounded-full text-gray-600 border">
                        {{ $service->duration }} mins
                    </span>
                </div>

                <div class="mt-auto">
                    <a href="{{ route('booking.create', $service->id) }}"
                       onclick="return handleBooking(event, {{ $service->id }})"
                       class="block w-full rounded-xl bg-yellow-500 px-5 py-3 text-center font-semibold text-white hover:bg-yellow-600 transition">
                        Avail Promo
                    </a>
                </div>

            </article>
        @endforeach

    </div>

@endif

        </div>
    </div>
</div>

<!-- LOGIN OVERLAY -->
<div id="loginOverlay"
     class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-xl text-center w-[90%] max-w-md">

        <h2 class="text-2xl font-bold mb-2">Login Required</h2>
        <p class="text-gray-600 mb-6">
            You need to login before booking a service.
        </p>

        <a href="{{ route('login') }}"
           class="block bg-yellow-500 text-white py-3 rounded-xl font-semibold hover:bg-yellow-600">
            Go to Login
        </a>

        <button onclick="closeOverlay()"
                class="mt-4 text-gray-500 hover:text-black">
            Cancel
        </button>

    </div>
</div>

@endsection