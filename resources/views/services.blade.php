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
            <p class="mt-4 max-w-2xl mx-auto text-gray-500">
                Browse our services, packages, and promos. Book instantly.
            </p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="max-w-3xl mx-auto mb-8 rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        {{-- ===================== SERVICES ===================== --}}
        <section id="services" class="mb-20">
            <h2 class="text-3xl font-bold mb-8 text-gray-900">Services</h2>

            <div class="grid gap-8 lg:grid-cols-3">
                @forelse($services as $service)
                    @include('partials.service-card', ['item' => $service])
                @empty
                    <p class="text-gray-500">No services available.</p>
                @endforelse
            </div>
        </section>

        {{-- ===================== PACKAGES ===================== --}}
        <section id="packages" class="mb-20">
            <h2 class="text-3xl font-bold mb-8 text-gray-900">Packages</h2>

            <div class="grid gap-8 lg:grid-cols-3">
                @forelse($packages as $package)
                    @include('partials.service-card', ['item' => $package])
                @empty
                    <p class="text-gray-500">No packages available.</p>
                @endforelse
            </div>
        </section>

        {{-- ===================== PROMOS ===================== --}}
        <section id="promos">
            <h2 class="text-3xl font-bold mb-8 text-gray-900">Promos</h2>

            <div class="grid gap-8 lg:grid-cols-3">
                @forelse($promos as $promo)
                    @include('partials.service-card', ['item' => $promo])
                @empty
                    <p class="text-gray-500">No promos available.</p>
                @endforelse
            </div>
        </section>

    </div>
</div>

@guest
    <!-- Global Login Modal -->
    <div id="loginModal"
         class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm px-4">

        <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900 mb-3">
                Login Required
            </h2>

            <p class="text-gray-600 mb-6">
                You need to log in before booking a service.
            </p>

            <a href="{{ route('login') }}"
               class="inline-block rounded-xl bg-yellow-500 px-8 py-3 font-semibold text-white hover:bg-yellow-600 transition">
                Log In
            </a>
        </div>
    </div>

    <script>
        function openLoginModal() {
            const modal = document.getElementById('loginModal');

            if (!modal) return;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    </script>
@endguest

@endsection