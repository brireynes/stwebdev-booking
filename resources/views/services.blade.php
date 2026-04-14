@extends('layouts.app')

@section('content')
<div class="bg-background text-on-surface">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="text-center mb-14">
            <span class="inline-block text-sm uppercase tracking-[0.35em] text-primary mb-3">Our Services</span>
            <h1 class="text-5xl font-bold tracking-tight">Choose the perfect salon service</h1>
            <p class="mt-4 max-w-2xl mx-auto text-on-surface-variant">Browse our service collection, view details, and add the service to your cart before booking.</p>
        </div>

        @if(session('success'))
            <div class="max-w-3xl mx-auto mb-8 rounded-3xl border border-amber-200/20 bg-amber-50/10 p-5 text-amber-100">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-8 lg:grid-cols-3">
            @forelse($services as $service)
                <article class="rounded-[2rem] border border-outline-variant/20 bg-surface-container p-8 shadow-xl shadow-black/5 transition hover:-translate-y-1">
                    <h2 class="text-2xl font-semibold text-on-surface mb-3">{{ $service->name }}</h2>
                    <p class="text-on-surface-variant mb-6">{{ \Illuminate\Support\Str::limit($service->description, 130) }}</p>
                    <div class="mb-6 flex items-center justify-between gap-4">
                        <div>
                            <span class="block text-sm uppercase tracking-[0.3em] text-primary">From</span>
                            <p class="text-3xl font-bold">₱{{ number_format($service->price, 2) }}</p>
                        </div>
                        <span class="rounded-full bg-surface-container-high px-4 py-2 text-sm text-on-surface-variant">{{ $service->duration }} mins</span>
                    </div>

                    <div class="space-y-3">
                        <a href="{{ route('services.show', $service) }}" class="block w-full rounded-3xl bg-primary px-5 py-3 text-center font-semibold text-on-primary transition hover:bg-primary-container">Details</a>

                        <form action="{{ route('cart.add') }}" method="POST" class="">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <button type="submit" class="w-full rounded-3xl border border-primary/30 bg-transparent px-5 py-3 text-sm font-semibold uppercase tracking-[0.2em] text-primary transition hover:bg-primary/5">Add to Cart</button>
                        </form>
                    </div>
                </article>
            @empty
                <div class="lg:col-span-3 rounded-[2rem] border border-outline-variant/20 bg-surface-container p-10 text-center text-on-surface-variant">
                    No services are available yet. Please check back soon or add service items in the admin panel.
                </div>
            @endforelse
        </div>

        <section class="mt-20">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div>
                    <h2 class="text-3xl font-bold">Our Packages</h2>
                    <p class="mt-3 text-on-surface-variant max-w-2xl">Pick a package that fits your event style, from quick glam sessions to full styling experiences.</p>
                </div>
            </div>

            <div class="mt-8 overflow-x-auto pb-6">
                <div class="flex gap-6 min-w-[110%] snap-x snap-mandatory">
                    @foreach($packages as $package)
                        <div class="snap-start min-w-[320px] rounded-[2rem] border border-outline-variant/15 bg-surface-container p-8 shadow-lg shadow-black/10">
                            <div class="mb-4 flex items-center justify-between gap-3">
                                <span class="rounded-full bg-primary px-3 py-1 text-xs uppercase tracking-[0.25em] text-on-primary">{{ $package['tag'] }}</span>
                                <span class="text-2xl font-bold text-primary">{{ $package['price'] }}</span>
                            </div>
                            <h3 class="text-2xl font-semibold mb-3">{{ $package['title'] }}</h3>
                            <p class="text-on-surface-variant mb-6">{{ $package['description'] }}</p>
                            <ul class="mb-8 space-y-3 text-sm text-on-surface-variant">
                                @foreach($package['items'] as $item)
                                    <li>• {{ $item }}</li>
                                @endforeach
                            </ul>
                            <button class="w-full rounded-3xl bg-primary px-5 py-3 text-sm font-semibold text-on-primary transition hover:bg-primary-container">Book Package</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="mt-20 pb-20">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div>
                    <h2 class="text-3xl font-bold">Promos</h2>
                    <p class="mt-3 text-on-surface-variant max-w-2xl">Enjoy our latest promos and special offers for selected services and packages.</p>
                </div>
            </div>

            <div class="mt-8 overflow-x-auto pb-6">
                <div class="flex gap-6 min-w-[110%] snap-x snap-mandatory">
                    @foreach($promos as $promo)
                        <div class="snap-start min-w-[320px] rounded-[2rem] border border-outline-variant/15 bg-surface-container p-8 shadow-lg shadow-black/10">
                            <div class="mb-4 flex items-center justify-between gap-3">
                                <span class="rounded-full bg-yellow-600 px-3 py-1 text-xs uppercase tracking-[0.25em] text-white">{{ $promo['label'] }}</span>
                                <span class="text-sm text-on-surface-variant">{{ $promo['duration'] }}</span>
                            </div>
                            <h3 class="text-2xl font-semibold mb-3">{{ $promo['title'] }}</h3>
                            <p class="text-on-surface-variant mb-6">{{ $promo['description'] }}</p>
                            <button class="w-full rounded-3xl bg-primary px-5 py-3 text-sm font-semibold text-on-primary transition hover:bg-primary-container">Avail Promo</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endsection