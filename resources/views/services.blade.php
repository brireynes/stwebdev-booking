@extends('layouts.app')

@section('content')
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
            <p class="mt-4 max-w-2xl mx-auto text-on-surface-variant text-shadow-gray-700">
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
        <div class="grid gap-8 lg:grid-cols-3">

            @forelse($services as $service)
                <article class="flex flex-col justify-between h-full rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:shadow-md">

                    <!-- Image -->
                    <div class="mb-5">
                        <img
                            src="https://via.placeholder.com/600x400?text=Service+Image"
                            alt="Service Image"
                            class="w-full h-48 object-cover rounded-xl border border-gray-200"
                        >
                    </div>

                    <!-- Content -->
                    <div class="flex-1">

                        <!-- Title -->
                        <h2 class="text-xl font-semibold text-gray-900 mb-2">
                            {{ $service->name }}
                        </h2>

                        <!-- Description -->
                        <p class="text-gray-500 text-sm mb-5">
                            {{ \Illuminate\Support\Str::limit($service->description, 120) }}
                        </p>

                        <!-- Price + Duration -->
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <span class="text-xs uppercase tracking-widest text-gray-400">
                                    Price
                                </span>
                                <p class="text-lg font-bold text-gray-900">
                                    ₱{{ number_format($service->price, 2) }}
                                </p>
                            </div>

                            <span class="text-xs bg-gray-100 px-3 py-1 rounded-full text-gray-600">
                                {{ $service->duration }} mins
                            </span>
                        </div>

                    </div>

                    <!-- BUTTON (always aligned bottom) -->
                    <div class="mt-auto">
                        <a href="{{ route('booking.create', $service->id) }}"
                           class="block w-full rounded-xl bg-yellow-500 px-5 py-3 text-center font-semibold text-white hover:bg-yellow-600 transition">
                            Book Now
                        </a>
                    </div>

                </article>
            @empty
                <div class="lg:col-span-3 text-center text-gray-500 py-10">
                    No services available yet.
                </div>
            @endforelse

        </div>

    </div>
</div>
@endsection